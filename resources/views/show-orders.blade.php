<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 8 HTML to PDF Demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body class="antialiased container mt-5">


    <table class="table">
        <thead>
            <tr class="table-primary">
                <td> id </td>
                <td>Order Name</td>
                <td>Billing Address</td>
                <td>Shipping Address</td>
                <td>Kits</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>    
                    <td>{{ $order['order']['id'] }}</td> 
                    <td>{{ $order['order']['name'] }}</td>
                    <td>{{ $order['billing']['address'] }}</td>
                    <td>{{ $order['shipping']['address'] }}</td>
                    <td>
                        @foreach ($order['kits'] as $kit)
                            {{$kit['name']}}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
    

 
    
</body>

</html>