@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Restaurant Staff</h1>
      <div class="col-md-8">
        <form action="{{ route('restaurantstaff.index') }}" method="get">
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
              <th>Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($restaurant_staff as $restaurantstaff)
              <tr>
                <td>{{ $restaurantstaff->name }}</td>
                <td>{{ $restaurantstaff->gender }}</td>
                <td>{{ $restaurantstaff->email }}</td>
                <td>{{ $restaurantstaff->phone }}</td>
                <td>{{ $restaurantstaff->address }}</td>
                <td>
                  <a href="{{ route('restaurantstaff.edit', $restaurantstaff->user_id) }}"
                    class="btn btn-sm btn-info text-white"><i class="bi bi-pencil-fill"></i></a> |
                  <form action="{{ route('restaurantstaff.destroy', $restaurantstaff->user_id) }}"
                    onsubmit="return confirm('Are you sure?');" class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $restaurant_staff->links() }}
        <a class="btn btn-primary" href="{{ route('restaurantstaff.create') }}">Tambah Data</a>
        <a href="{{ route('rs.print') }}" class="btn btn-danger">Export PDF</a>
      </div>
    </div>
  </div>
@endsection
