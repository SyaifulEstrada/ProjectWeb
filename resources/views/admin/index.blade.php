@extends('admin.layouts.main')

@section('content')
  <h1 class="mt-2 text-center">Hello, {{ Auth::user()->name }}</h1>
@endsection
