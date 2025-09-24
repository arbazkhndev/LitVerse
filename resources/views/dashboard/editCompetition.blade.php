@extends('Layouts.app')

@section('title','Edit Competition')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Competition</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('competitions.update', $competition->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Competition Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $competition->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $competition->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $competition->type }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $competition->start_date }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $competition->end_date }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="rules" class="form-label">Rules</label>
                        <textarea class="form-control" id="rules" name="rules" rows="3">{{ $competition->rules }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="prize" class="form-label">Prize</label>
                        <input type="text" class="form-control" id="prize" name="prize" value="{{ $competition->prize }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Competition</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
