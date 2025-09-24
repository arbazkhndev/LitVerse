@extends('Layouts.app')

@section('title','Edit Book')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Book</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Book Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" value="{{ $book->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $book->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="PDF" {{ $book->type == 'PDF' ? 'selected' : '' }}>PDF</option>
                            <option value="Hardcopy" {{ $book->type == 'Hardcopy' ? 'selected' : '' }}>Hardcopy</option>
                            <option value="CD" {{ $book->type == 'CD' ? 'selected' : '' }}>CD</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="subscription_period" class="form-label">Subscription Period (months)</label>
                        <input type="number" min="0" class="form-control" id="subscription_period" name="subscription_period" value="{{ $book->subscription_period }}">
                    </div>

                    <div class="mb-3">
                        <label for="shipping_charges" class="form-label">Shipping Charges</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="shipping_charges" name="shipping_charges" value="{{ $book->shipping_charges }}">
                    </div>

                    <div class="mb-3">
                        <label for="pdf_file" class="form-label">Upload PDF (optional)</label>
                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept="application/pdf">
                        @if($book->pdf_file)
                            <small class="text-muted">Current file: {{ $book->pdf_file }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
