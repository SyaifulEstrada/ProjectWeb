@extends('admin.layouts.main')

@section('content')
  <div class="container">
    <h1 class="mb-4 mt-5 text-center">Tambah Data Menu</h1>
    <form action="{{ route('menu.store') }}" class="form-horizontal" method="POST" style="margin-left: 100px;">
      @csrf
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" name="quantity" id="quantity" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="price" class="form-control" id="price" aria-describedby="price" name="price">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
  </div>
@endsection
