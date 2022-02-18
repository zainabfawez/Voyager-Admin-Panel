<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\Order;
use PDF;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ordersExport;

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
    
    public function getOrder(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order['shipping'] =  $order->shipping_address;
        $order['billing'] =  $order->billing_address;
        $order['kits'] = $order->kits;
        $pdf_doc = PDF::loadView('show-order', ['order'=>$order]);
        return $pdf_doc->download('order.pdf');
    }

   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {   
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }    

}
