@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Order Item</h1>
      <div class="col-md-8">
        <form action="{{ route('order_items.index') }}" method="get">
          <div class="input-group mb-3 mt-5">
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </div>
        </form>
        <table class="table-borderless mt-3 table rounded text-center shadow">
          <thead>
            <tr>
              <th>No</th>
              <th>Order Id</th>
              <th>Food Id</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Ingredients</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order_items as $orderitem)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $orderitem->order_id }}</td>
                <td>{{ $orderitem->food_id }}</td>
                <td>{{ $orderitem->quantity }}</td>
                <td>{{ $orderitem->unit_price }}</td>
                <td>{{ $orderitem->ingredients_name }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $order_items->links() }}
        <a href="{{ route('orderitems.print') }}" class="btn btn-danger">Export PDF</a>
      </div>
    </div>
  </div>
@endsection
