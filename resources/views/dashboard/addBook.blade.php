@extends('Layouts.app')

@section('title','Add Book')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Book</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Book Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="PDF">PDF</option>
                            <option value="Hardcopy">Hardcopy</option>
                            <option value="CD">CD</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="subscription_period" class="form-label">Subscription Period (months, only for PDF)</label>
                        <input type="number" min="0" class="form-control" id="subscription_period" name="subscription_period">
                    </div>

                    <div class="mb-3">
                        <label for="shipping_charges" class="form-label">Shipping Charges (for Hardcopy/CD)</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="shipping_charges" name="shipping_charges">
                    </div>

                    <div class="mb-3">
                        <label for="pdf_file" class="form-label">Upload PDF (optional)</label>
                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept="application/pdf">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
