<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList(Request $request)
    {
        $from = $request->query('from_date');
        $to = $request->query('to_date');
        if($from && $to){
            $order = Order::whereBetween('created_at',[$from,$to])->get();
            return view('admin.pages.order-list');
        }
        return view('admin.pages.order-list');
    }
}
