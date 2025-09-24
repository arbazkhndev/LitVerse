@extends('Layouts.app')

@section('title','Orders')

@section('content')
<h1 class="text-uppercase text-center text-primary">Orders</h1>

<a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Add New Order</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Book</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Ordered At</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Unknown' }}</td>
                <td>{{ $order->book->title ?? 'Deleted Book' }}</td>
                <td>{{ $order->quantity }}</td>
                <td>
                    <span class="badge 
                        @if($order->status == 'completed') bg-success 
                        @elseif($order->status == 'pending') bg-warning 
                        @else bg-danger @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Update</a>
                    
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this order?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
