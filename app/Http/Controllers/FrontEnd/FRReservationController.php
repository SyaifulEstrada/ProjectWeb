<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Customer;

class FRReservationController extends Controller
{
    //

    public function create()
    {
      $customers = Customer::all();
      return view('reservation.index', [
        'title' => 'Reservation'
      ], compact('customers'));
    }

    public function Store(ReservationStoreRequest $request)
    {
      Reservation::create([
        'customer_id' => $request->customer_id,
        'customer_name' => $request->customer_name,
        'date' => $request->date,
        'time' => $request->time,
        'no_of_guest' => $request->no_of_guest,
      ]);

      return to_route('payment.index');
    }

}
