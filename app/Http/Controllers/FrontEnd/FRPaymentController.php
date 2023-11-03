<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentStoreRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Pdf;
use Carbon\Carbon;

class FRPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $order_items = OrderItem::all()->last();
      return view('foodpayments', compact('order_items'), [
        'title' => 'Food Payment'
      ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentStoreRequest $request)
    {

      Payment::create([
        'order_id' => $request->order_id,
        'payment_date' => $request->payment_date,
        'payment_amount' => $request->payment_amount,
        'customer_name' => $request->customer_name,
        'food_id' => $request->food_id,
      ]);
      
      return to_route('payment.bill');


    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function bill()
    {
      $payments = Payment::all('id_invoice', 'order_id', 'payment_date', 'payment_amount', 'customer_name', 'food_id')->last();

      view()->share('payments', $payments);
      $pdf = FacadePdf::loadview('food.bill');
      return $pdf->download('bill.pdf');

      // return view('food.bill', compact('payments'));

    }
}
