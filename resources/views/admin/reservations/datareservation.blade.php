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

  <h1>Data Reservation</h1>

  <table id="customers">
    <tr>
      <th>Customer Id</th>
      <th>Date</th>
      <th>Time</th>
      <th>Guest Number</th>
    </tr>

    @foreach ($reservations as $reservation)
      <tr>
        <td>{{ $reservation->customer_id }}</td>
        <td>{{ $reservation->date }}</td>
        <td>{{ $reservation->time }}</td>
        <td>{{ $reservation->no_of_guest }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
