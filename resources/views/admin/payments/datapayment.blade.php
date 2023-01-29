<!DOCTYPE html>
<html>

<head>
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #0d6efd;
      color: white;
    }
  </style>
</head>

<body>

  <h1>Data Payment</h1>

  <table id="customers">
    <tr>
      <th>Payment Id</th>
      <th>Order Id</th>
      <th>Payment Date</th>
      <th>Payment Amount</th>
    </tr>

    @foreach ($payments as $payment)
      <tr>
        <td>{{ $payment->id_invoice }}</td>
        <td>{{ $payment->order_id }}</td>
        <td>{{ $payment->payment_date }}</td>
        <td>{{ $payment->payment_amount }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
