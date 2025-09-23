@extends('Layouts.app')

@section('title','Products')

@section('content')
<h1 class="text-uppercase text-center text-primary">Products</h1>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->Pname }}</td>
                <td>{{ $item->Pprice }}</td>
                <td>{{ $item->Pdesc }}</td>
                <td>
                    <a href="/editProduct/{{ $item->id }}" class="btn btn-warning">Update</a> <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection