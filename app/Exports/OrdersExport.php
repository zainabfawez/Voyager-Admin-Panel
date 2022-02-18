<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
class OrdersExport implements FromCollection
{  
   
    public function collection()
    {
        $orders = Order::All();
        $response = null;
        $responses = [];
        foreach ($orders as $order){
            $response['order'] = $order;
            $response['shipping'] = $order->shipping_address;
            $response['billing'] = $order->billing_address;
            $response['kits'] = $order->kits;
            array_push($responses,$response);        
        }
       return new Collection($responses);
    }
}
