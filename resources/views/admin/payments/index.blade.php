@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Payment</h1>
      <div class="col-md-8">
        <form action="{{ route('payments.index') }}" method="get">
          <div class="input-group mb-3 mt-5">
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </div>
        </form>
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <table class="table-borderless table rounded text-center shadow">
          <thead>
            <tr>
              <th>Payment Id</th>
              <th>Order Id</th>
              <th>Payment Date</th>
              <th>Payment Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($payments as $payment)
              <tr>
                <td>{{ $payment->id_invoice }}</td>
                <td>{{ $payment->order_id }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>{{ $payment->payment_amount }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $payments->links() }}
        <a href="{{ route('payments.print') }}" class="btn btn-danger">Export PDF</a>
      </div>
    </div>
  </div>
@endsection
