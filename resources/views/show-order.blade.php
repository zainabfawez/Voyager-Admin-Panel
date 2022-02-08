<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style> @page { margin: 5px;} </style>
    <title>Orders Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

    <body class="antialiased container mt-5">
       <img src="E:\xampp\htdocs\myvoyager2\public\image\logo.png">
        <div>
            <p> {{  now()->toDateTimeString() }} </p>
        </div>
        <div style="width: 95%">
            <table class="table table-bordered">
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
                        <tr>    
                            <td>{{ $order['id'] }}</td> 
                            <td>{{ $order['name'] }}</td>
                            <td>{{ $order['billing']['address'] }}</td>
                            <td>{{ $order['shipping']['address'] }}</td>
                            <td>
                                @foreach ($order['kits'] as $kit)
                                    <p>- {{$kit['name']}}</p>
                                @endforeach
                            </td>
                        </tr>                  
                </tbody>
            </table>
        </div>
    </body>

</html>


