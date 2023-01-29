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

  <h1>Data Kitchen Staff</h1>

  <table id="customers">
    <tr>
      <th>Name</th>
      <th>Gender</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
    </tr>

    @foreach ($kitchen_staffs as $ks)
      <tr>
        <td>{{ $ks->name }}</td>
        <td>{{ $ks->gender }}</td>
        <td>{{ $ks->email }}</td>
        <td>{{ $ks->phone }}</td>
        <td>{{ $ks->address }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
