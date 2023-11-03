@extends('layouts.app')

@section('content')
  <style>
    body {
      background-image: url("img/payment.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>


  <div class="container text-white">
    <h1 class="mt-5 text-center">Payment</h1>
    <form action="{{ route('paymentreservation.store') }}" method="POST" style="margin-left: 250px; margin-top: 100px;">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="customer_id" class="form-label">Customer Name</label>
            <select name="customer_id" id="customer_id" class="form-select">
              <option value="{{ $customers->customer_id }}">{{ $customers->customer_name }}</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="payment_amount" class="form-label">Payment Amount</label>
            <input type="text" class="form-control" id="payment_amount" name="payment_amount">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="no_of_guest" class="form-label">Guest Number</label>
            <input type="text" class="form-control" id="no_of_guest" name="no_of_guest"
              value="{{ $customers->table_id }}" readonly>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
