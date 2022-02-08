<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\Order;
use PDF;

class OrderController extends VoyagerBaseController
{

    public function getAllOrders() {
        
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
        $pdf_doc = PDF::loadView('show-orders', ['orders'=>$responses]);
        return $pdf_doc->download('orders.pdf');
    }    

}
