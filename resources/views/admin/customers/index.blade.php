@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Customer</h1>
      <div class="col-md-8">
        <form action="{{ route('customer.index') }}" method="get">
          <div class="input-group mb-3 mt-5">
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </div>
        </form>
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <table class="table-borderless table rounded text-center shadow">
          <thead>
            <tr>
              <th>No</th>
              <th>Customer Id</th>
              <th>Customer Name</th>
              <th>Table Id</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->customer_id }}</td>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->table_id }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $customers->links() }}
        <a class="btn btn-primary" href="{{ route('customer.create') }}">Add Customer</a>
        <a href="{{ route('customer.print') }}" class="btn btn-danger">Export PDF</a>
      </div>
    </div>
  </div>
@endsection
