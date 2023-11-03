@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Reservation Payment</h1>
      <div class="col-md-8">
        <form action="{{ route('reservationspayments.index') }}" method="get">
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
              <th>Payment Date</th>
              <th>Payment Amount</th>
              <th>Customer Id</th>
              <th>Guest Number</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservation_payments as $rps)
              <tr>
                <td>{{ $rps->id_invoice }}</td>
                <td>{{ $rps->payment_date }}</td>
                <td>{{ $rps->payment_amount }}</td>
                <td>{{ $rps->customer_id }}</td>
                <td>{{ $rps->no_of_guest }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $reservation_payments->links() }}
        <a href="{{ route('reservationpayments.print') }}" class="btn btn-danger">Export PDF</a>
      </div>
    </div>
  </div>
@endsection
