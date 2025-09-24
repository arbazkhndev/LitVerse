@extends('Layouts.app')

@section('title','Competitions')

@section('content')
<h1 class="text-uppercase text-center text-primary">Competitions</h1>

<a href="{{ route('competitions.create') }}" class="btn btn-success mb-3">Add New Competition</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Prize</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($competitions as $competition)
            <tr>
                <td>{{ $competition->id }}</td>
                <td>{{ $competition->title }}</td>
                <td>{{ $competition->type }}</td>
                <td>{{ \Carbon\Carbon::parse($competition->start_date)->format('Y-m-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($competition->end_date)->format('Y-m-d') }}</td>
                <td>{{ $competition->prize ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('competitions.edit', $competition->id) }}" class="btn btn-warning">Update</a>

                    <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this competition?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
