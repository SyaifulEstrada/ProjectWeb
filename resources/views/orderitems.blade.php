@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="mt-5 text-center">Order Now</h1>

    <form action="{{ route('orderi.store') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <label for="order_id" class="form-label">Order Id</label>
          <select name="order_id" id="order_id" class="form-select">
            @foreach ($orders as $order)
              <option>{{ $order->order_id }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="food_id" class="form-label">Food Name</label>
          <select name="food_id" id="food_id" class="form-select">
            @foreach ($menu as $menus)
              <option value="{{ $menus->food_id }}">{{ $menus->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="text" name="quantity" id="quantity" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="unit_price" class="form-label">Unit Price</label>
          <input type="text" name="unit_price" id="unit_price" class="form-control">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <label for="ingredients_name" class="form-label">Ingredient</label>
          <select name="ingredients_name" id="ingredients_name" class="form-select">
            @foreach ($menu as $menus)
              <option value="{{ $menus->ingredients_name }}">{{ $menus->ingredients_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="customer_name" class="form-label">Customer Name</label>
          <select name="customer_name" id="customer_name" class="form-select">
            @foreach ($customers as $customer)
              <option>{{ $customer->customer_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
@endsection
