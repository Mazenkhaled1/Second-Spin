<?php

namespace App\Http\Controllers\Admin\Dashboard\Order;

use App\Http\Controllers\Controller;

use App\Models\Order;

class OrderDashboardController extends Controller
{
    public Function index() 
    {
        $orders = Order::all() ;
        return view('Admin.order' , compact('orders')) ;
    }


    public function destroy(Order $order) 
    {

        $order->delete() ;
        return redirect('dashboard/order/')->with('deleted','Shipment Started For This Order') ; 
    }
}
