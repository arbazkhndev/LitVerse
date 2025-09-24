@extends('Layouts.app')

@section('title','Books')

@section('content')
<h1 class="text-uppercase text-center text-primary">Books</h1>

<a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add New Book</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Type</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->author }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('books.edit', $item->id) }}" class="btn btn-warning">Update</a>
                    
                    <form action="{{ route('books.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
