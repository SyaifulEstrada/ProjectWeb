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
      <th>Payment Date</th>
      <th>Payment Amount</th>
      <th>Customer Id</th>
      <th>Guest Number</th>
    </tr>

    @foreach ($reservation_payments as $rp)
      <tr>
        <td>{{ $rp->id_invoice }}</td>
        <td>{{ $rp->payment_date }}</td>
        <td>{{ $rp->payment_amount }}</td>
        <td>{{ $rp->customer_id }}</td>
        <td>{{ $rp->no_of_guest }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
