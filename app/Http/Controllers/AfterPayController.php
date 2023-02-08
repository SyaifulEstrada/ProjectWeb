<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class AfterPayController extends Controller
{
    public function index($id_invoice)
    {
      
      $payment = Payment::where('id_invoice', $id_invoice)->first();
      dd($payment);

    }
}
