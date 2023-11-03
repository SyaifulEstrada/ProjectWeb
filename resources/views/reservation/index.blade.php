@extends('layouts.app')

@section('content')
  <style>
    body {
      background-image: url("img/star.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>

  <div class="container text-white">
    <h1 class="mt-5 text-center">Make Your Reservation</h1>
    <form action="{{ route('reservation.store') }}" method="POST" style="margin-left: 250px; margin-top: 100px;">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="customer_id" class="form-label">Customer Name</label>
            <select name="customer_id" id="customer_id" class="form-select">
              @foreach ($customers as $cs)
                <option value="{{ $cs->customer_id }}">{{ $cs->customer_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="no_of_guest" class="form-label">Guest Number</label>
            <select name="no_of_guest" id="no_of_guest" class="form-select">
              @foreach ($customers as $cs)
                <option value="{{ $cs->customer_id }}">{{ $cs->table_id }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
  </form>
  </div>
  </div>
@endsection
