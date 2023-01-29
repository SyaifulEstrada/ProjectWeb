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

  <h1>Data Order Item</h1>

  <table id="customers">
    <tr>
      <th>Order Id</th>
      <th>Food Id</th>
      <th>Quantity</th>
      <th>Unit Price</th>
      <th>Ingredients</th>
    </tr>

    @foreach ($order_items as $orderitems)
      <tr>
        <td>{{ $orderitems->order_id }}</td>
        <td>{{ $orderitems->food_id }}</td>
        <td>{{ $orderitems->quantity }}</td>
        <td>{{ $orderitems->unit_price }}</td>
        <td>{{ $orderitems->ingredients_name }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
