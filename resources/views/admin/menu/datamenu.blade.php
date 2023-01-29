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

  <h1>Data Menu</h1>

  <table id="customers">
    <tr>
      <th>Name</th>
      <th>Ingredient</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>

    @foreach ($menu as $menus)
      <tr>
        <td>{{ $menus->name }}</td>
        <td>{{ $menus->ingredients_name }}</td>
        <td>{{ $menus->quantity }}</td>
        <td>{{ $menus->price }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
