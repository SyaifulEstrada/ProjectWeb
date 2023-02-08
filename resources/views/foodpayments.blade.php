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
            <select name="order_id" id="order_id" class="form-select">
              @foreach ($orders as $order)
                <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
              @endforeach
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
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      {{-- <a href="{{ route('struk.food') }}" class="btn btn-danger">Print Struk</a> --}}
      {{-- <a href="{{ route('payment.store', $id_invoice) }}" type="submit" class="btn btn-primary">Submit</a> --}}

    </form>
  </div>
@endsection
