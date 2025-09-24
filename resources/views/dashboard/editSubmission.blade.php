@extends('Layouts.app')

@section('title','Edit Submission')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Submission</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('submissions.update', $submission->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Select User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $submission->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="competition_id" class="form-label">Select Competition</label>
                        <select class="form-control" id="competition_id" name="competition_id" required>
                            @foreach($competitions as $competition)
                                <option value="{{ $competition->id }}" {{ $submission->competition_id == $competition->id ? 'selected' : '' }}>
                                    {{ $competition->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Submission Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required>{{ $submission->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending" {{ $submission->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $submission->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $submission->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Submission</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
