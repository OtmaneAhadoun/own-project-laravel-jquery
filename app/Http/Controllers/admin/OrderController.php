<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function confirm(Order $order)
    {
        $order->status=true;
        $order->save();
        return back();
    }
    public function cancel(Order $order)
    {
        foreach($order->order_items as $item){
            $item->product->quantity+=$item->quantity;
            $item->product->save();
            $item->delete();
        }
        $order->delete();
        return back();
    }
}
