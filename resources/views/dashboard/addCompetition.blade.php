@extends('Layouts.app')

@section('title','Add Competition')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Competition</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('competitions.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Competition Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Essay, Story, etc." required>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="rules" class="form-label">Rules</label>
                        <textarea class="form-control" id="rules" name="rules" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="prize" class="form-label">Prize</label>
                        <input type="text" class="form-control" id="prize" name="prize" placeholder="Gift, Cash, Certificate, etc.">
                    </div>

                    <button type="submit" class="btn btn-primary">Create Competition</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
