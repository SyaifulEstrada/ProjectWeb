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
    <h1 class="mt-5 text-center">Food Payment</h1>
    <form action="{{ route('payment.store') }}" method="POST" style="margin-left: 250px; margin-top: 100px;">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="order_id" class="form-label">Order Id</label>
            <input type="text" class="form-control" name="order_id" id="order_id" value="{{ $order_items->order_id }}"
              readonly>
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
            <input type="text" class="form-control" id="payment_amount" name="payment_amount"
              value="{{ $order_items->unit_price }}" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
              value="{{ $order_items->customer_name }}" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="food_id">Food Id</label>
            <input type="text" class="form-control" name="food_id" id="food_id" value="{{ $order_items->food_id }}"
              readonly>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
