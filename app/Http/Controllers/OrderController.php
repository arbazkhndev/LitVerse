<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // ✅ Show all orders with book + user info
        $orders = Order::with(['book', 'user'])->latest()->get();
        return view('dashboard.orders', compact('orders'));
    }

    public function create()
    {
        // ✅ Load books + users for dropdowns
        $books = Book::all();
        $users = User::all();
        return view('dashboard.addOrder', compact('books', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'status' => 'required|in:pending,completed,cancelled',
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $books = Book::all();
        $users = User::all();
        return view('dashboard.editOrder', compact('order', 'books', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'status' => 'required|in:pending,completed,cancelled',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
