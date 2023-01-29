@extends('admin.layouts.main')

@section('content')
  <div class="container">

    <h1 class="mt-5 mb-5 text-center">Add Customer</h1>

    <form action="{{ route('customer.store') }}" method="POST" style="margin-left: 150px;">
      @csrf

      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="table_id" class="form-label">Table Id</label>
            <input type="text" class="form-control" id="table_id" name="table_id">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
