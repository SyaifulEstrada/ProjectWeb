@extends('admin.layouts.main')

@section('content')
  <div class="container">
    <h1 class="mb-4 mt-5 text-center">Tambah Data RestaurantStaff</h1>
    <form action="{{ route('restaurantstaff.update', $staffrestaurant->user_id) }}" class="form-horizontal" method="POST"
      style="margin-left: 100px;">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
              value="{{ $staffrestaurant->name }}">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" name="gender" id="gender" class="form-control"
              value="{{ $staffrestaurant->gender }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" name="email"
              value="{{ $staffrestaurant->email }}">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" aria-describedby="password" name="password"
              value="{{ $staffrestaurant->password }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone"
              value="{{ $staffrestaurant->phone }}">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" aria-describedby="address" name="address"
              value="{{ $staffrestaurant->address }}">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
  </div>
@endsection
