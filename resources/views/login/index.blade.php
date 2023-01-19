@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top: 128px !important;">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <main class="form-signin w-100 m-auto">
          <h1 class="h3 fw-normal mb-3 text-center">Please Login</h1>
          <form action="/login" method="POST">
            @csrf
            @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="form-floating mb-2">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-2">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          </form>
        </main>
      </div>
    </div>
  </div>
@endsection
