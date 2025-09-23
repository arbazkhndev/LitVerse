@extends('Layouts.app')

@section('title','Add Products')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Add Product</h5>
      <div class="card">
        <div class="card-body">
          <form method="post" action="/createProduct">
            @csrf
            <div class="mb-3">
              <label for="Product_Name" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="Product_Name" name="Pname">
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" min="0" class="form-control" id="price" name="Pprice">
            </div>
            <div class="mb-3">
              <label for="Pdesc" class="form-label">Description</label>
              <input type="text" class="form-control" id="Pdesc" name="Pdesc">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection