@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Menu</h1>
      <div class="col-md-8">
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <table class="table-borderless mt-5 table rounded text-center shadow">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($menu as $menus)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menus->name }}</td>
                <td>{{ $menus->quantity }}</td>
                <td>{{ $menus->price }}</td>
                <td>
                  <a href="{{ route('restaurantstaff.edit', $menus->food_id) }}" class="btn btn-sm btn-info text-white"><i
                      class="bi bi-pencil-fill"></i></a> |
                  <form action="{{ route('menu.destroy', $menus->food_id) }}" onsubmit="return confirm('Are you sure?');"
                    class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $menu->links() }}
        <a class="btn btn-primary" href="{{ route('menu.create') }}">Tambah Data</a>
      </div>
    </div>
  </div>
@endsection
