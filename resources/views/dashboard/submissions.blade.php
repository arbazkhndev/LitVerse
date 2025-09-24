@extends('Layouts.app')

@section('title','Submissions')

@section('content')
<h1 class="text-uppercase text-center text-primary">Submissions</h1>

<a href="{{ route('submissions.create') }}" class="btn btn-success mb-3">Add New Submission</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Competition</th>
            <th>Content</th>
            <th>Status</th>
            <th>Submitted At</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($submissions as $submission)
            <tr>
                <td>{{ $submission->id }}</td>
                <td>{{ $submission->user->name ?? 'Unknown' }}</td>
                <td>{{ $submission->competition->title ?? 'Deleted Competition' }}</td>
                <td>{{ Str::limit($submission->content, 50) }}</td>
                <td>
                    <span class="badge 
                        @if($submission->status == 'approved') bg-success
                        @elseif($submission->status == 'pending') bg-warning
                        @else bg-danger @endif">
                        {{ ucfirst($submission->status) }}
                    </span>
                </td>
                <td>{{ $submission->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('submissions.edit', $submission->id) }}" class="btn btn-warning">Update</a>
                    
                    <form action="{{ route('submissions.destroy', $submission->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this submission?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
