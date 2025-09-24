<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        return view('dashboard.books', compact('books'));
    }

    public function create()
    {
        return view('dashboard.addBook');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|in:PDF,Hardcopy,CD',
            'subscription_period' => 'nullable|integer|min:0',
            'shipping_charges' => 'nullable|numeric|min:0',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        $data = $request->all();

        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')->store('books', 'public');
        }

        Book::create($data);

        return redirect('/books')->with('success', 'Book added successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('dashboard.editBook', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|in:PDF,Hardcopy,CD',
            'subscription_period' => 'nullable|integer|min:0',
            'shipping_charges' => 'nullable|numeric|min:0',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        $book = Book::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')->store('books', 'public');
        }

        $book->update($data);

        return redirect('/books')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book deleted successfully.');
    }
}
