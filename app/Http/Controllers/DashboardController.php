<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use App\Models\Competition;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // ✅ Fetch some stats for dashboard
        $booksCount = Book::count();
        $ordersCount = Order::count();
        $competitionsCount = Competition::count();
        $usersCount = User::count();

        // ✅ You can also fetch recent items
        $latestBooks = Book::latest()->take(5)->get();
        $latestOrders = Order::with('book', 'user')->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'booksCount',
            'ordersCount',
            'competitionsCount',
            'usersCount',
            'latestBooks',
            'latestOrders'
        ));
    }
}
