@extends('Layouts.app')

@section('title','Add Submission')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Submission</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('submissions.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Select User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">-- Select User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="competition_id" class="form-label">Select Competition</label>
                        <select class="form-control" id="competition_id" name="competition_id" required>
                            <option value="">-- Select Competition --</option>
                            @foreach($competitions as $competition)
                                <option value="{{ $competition->id }}">{{ $competition->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Submission Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Entry</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
