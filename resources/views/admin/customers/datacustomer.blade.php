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

  <h1>Data Customer</h1>

  <table id="customers">
    <tr>
      <th>Customer Id</th>
      <th>Customer Name</th>
      <th>Table Id</th>
    </tr>

    @foreach ($customers as $customer)
      <tr>
        <td>{{ $customer->customer_id }}</td>
        <td>{{ $customer->customer_name }}</td>
        <td>{{ $customer->table_id }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
