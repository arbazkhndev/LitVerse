@extends('Layouts.app')

@section('title','Edit Order')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Order</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('orders.update', $order->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Select User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="book_id" class="form-label">Select Book</label>
                        <select class="form-control" id="book_id" name="book_id" required>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ $order->book_id == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }} - ${{ number_format($book->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" value="{{ $order->quantity }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Order Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
