@extends('Layouts.app')

@section('title','Dashboard')

@section('content')
<h1 class="text-uppercase text-center text-primary mb-4">LitVerse Dashboard</h1>

{{-- ✅ Summary Cards --}}
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Books</h5>
                <p class="display-6">{{ $booksCount }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <p class="display-6">{{ $ordersCount }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Competitions</h5>
                <p class="display-6">{{ $competitionsCount }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="display-6">{{ $usersCount }}</p>
            </div>
        </div>
    </div>
</div>

{{-- ✅ Latest Books --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Latest Books</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestBooks as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->type }}</td>
                        <td>${{ number_format($book->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- ✅ Latest Orders --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Latest Orders</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Book</th>
                    <th>Status</th>
                    <th>Ordered At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestOrders as $order)
                    <tr>
                        <td>{{ $order->user->name ?? 'Unknown' }}</td>
                        <td>{{ $order->book->title ?? 'Deleted Book' }}</td>
                        <td>
                            <span class="badge 
                                @if($order->status == 'completed') bg-success
                                @elseif($order->status == 'pending') bg-warning
                                @else bg-danger @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
