@extends('admin.layouts.main')

@section('content')
  <div class="contaier">
    <h1 class="mb-4 mt-5 text-center">Tambah Data KitchenStaff</h1>
    <form action="{{ route('kitchenstaff.update', $kitchen_staffs->user_id) }}" class="form-horizontal" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
              value="{{ $kitchen_staffs->name }}">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" id="gender" class="form-control" name="gender"
              value="{{ $kitchen_staffs->gender }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" name="email"
              value="{{ $kitchen_staffs->email }}">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" aria-describedby="password" name="password"
              value="{{ $kitchen_staffs->password }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phone" name="phone"
              value="{{ $kitchen_staffs->phone }}">
          </div>
        </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" aria-describedby="address" name="address"
              value="{{ $kitchen_staffs->address }}">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection
