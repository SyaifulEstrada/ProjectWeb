@extends('admin.layouts.main')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1 class="text-center">Reservation</h1>
      <div class="col-md-8">
        <form action="{{ route('reservations.index') }}" method="get">
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
        <table class="table-borderless mt-5 table rounded text-center shadow">
          <thead>
            <tr>
              <th>Customer Id</th>
              <th>Date</th>
              <th>Time</th>
              <th>Guest Number</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservation as $reservations)
              <tr>
                <td>{{ $reservations->customer_id }}</td>
                <td>{{ $reservations->date }}</td>
                <td>{{ $reservations->time }}</td>
                <td>{{ $reservations->no_of_guest }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $reservation->links() }}
        <a href="{{ route('reservation.print') }}" class="btn btn-danger">Export PDF</a>
      </div>
    </div>
  </div>
@endsection
