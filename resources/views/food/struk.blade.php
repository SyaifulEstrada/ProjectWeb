<h1>Struk Pembayaran</h1>

@foreach ($payments as $payment)
  <p>Id Invoice : {{ $payment->id_invoice }}</p>
  <p>Order Id : {{ $payment->order_id }}</p>
  <p>Payment Date : {{ $payment->payment_date }}</p>
  <p>Payment Amount : {{ $payment->payment_amount }}</p>
@endforeach
