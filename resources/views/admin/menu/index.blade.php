@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Menu</h1>
      <div class="col-md-8">
        <form action="{{ route('menu.index') }}" method="get">
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
              <th>Name</th>
              <th>Image</th>
              <th>Ingredient</th>
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
                <td><img src="{{ Storage::url($menus->image) }}" alt="" style="width: 45px; height: 45px;"></td>
                <td>{{ $menus->ingredients_name }}</td>
                <td>{{ $menus->quantity }}</td>
                <td>{{ $menus->price }}</td>
                <td>
                  <a href="{{ route('menu.edit', $menus->food_id) }}" class="btn btn-sm btn-info text-white"><i
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
        <a href="{{ route('menu.print') }}" class="btn btn-danger">Export PDF</a>
      </div>
    </div>
  </div>
@endsection
