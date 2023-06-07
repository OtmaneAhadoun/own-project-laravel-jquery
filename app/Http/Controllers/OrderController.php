<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderShiped;
use App\Models\cart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $items = [];
        $total=0;
        if (auth()->check()) {
            $user = User::find(auth()->id());
            $items = $user->carts()->whereHas('product', function ($query) {
                $query->whereNull('deleted_at');
            })->latest()->get();
        }
        if(count($items)){
           $total=$items->reduce(function($current,$item){
                return $current+(str_ireplace("DH","",$item->product->price)*$item->quantity);
            },0);
        }
        $user = User::find(auth()->id());
        // $data = $user->order()->latest()->get();
        $data = $user->order()->whereHas('order_items', function ($query) {
            $query->whereHas('product', function ($query) {
                $query->whereNull('deleted_at');
            });
        })->with(['order_items' => function ($query) {
            $query->whereHas('product', function ($query) {
                $query->whereNull('deleted_at');
            });
        }])->latest()->get();
        if (count($data) >= 1 && count($data[0]->order_items)!=0) {
            return view("orderPage", compact('items','data','total'));
        }
        
        return redirect("/#overview")->with('warning', 'you have no order yet shop here');
    }
    public function createOrder(OrderRequest $request)
    {
        $fields = $request->validated();
        $items = User::find(auth()->id())->carts;
        $implement = false;
        foreach (User::find(auth()->id())->carts()->with('product')->get() as $item) {
            if ($item->quantity > $item->product->quantity) {
                $implement = true;
            }
        }
        if (!$implement) {
            $total = User::find(auth()->id())->carts()->with('product')->get()->reduce(function ($cuu, $item) {
                return $cuu + str_replace("DH", '', $item->product->price) * $item->quantity;
            }, 0);
            $order = new Order;
            $order->user_id = auth()->id();
            $order->total = $total;
            $order->save();
            foreach ($items as $item) {
                $order_item = new Order_item;
                $order_item->order_id = $order->id;
                $order_item->product_id = $item->product_id;
                $order_item->quantity = $item->quantity;
                $order_item->save();
            }
            foreach ($items as $item) {
                $product = Product::find($item->product_id);
                $product->quantity -= $item->quantity;
                $product->save();
            }
            cart::where('user_id', auth()->id())->delete();
            Delivery::create([
                'status' => false,
                'address' => $fields["address"],
                'phoneNumber' => $fields["phoneNumber"],
                'city' => $fields["city"],
                'order_id' => $order->id,
            ]);
            return to_route('orders.index')->with('success', 'order has been created');
        } else {
            return back()->with('failed', 'the quantity does not match the exists');
        }
    }
    public function createOrderfromCart(Request $request)
    {
        $items = User::find(auth()->id())->carts;
        $implement = false;
        foreach (User::find(auth()->id())->carts()->with('product')->get() as $item) {
            if ($item->quantity > $item->product->quantity) {
                $implement = true;
            }
        }
        if (!$implement) {
            $total = User::find(auth()->id())->carts()->with('product')->get()->reduce(function ($cuu, $item) {
                return $cuu + str_replace("DH", '', $item->product->price) * $item->quantity;
            }, 0);
            $order = new Order;
            $order->user_id = auth()->id();
            $order->total = $total;
            $order->save();
            foreach ($items as $item) {
                $order_item = new Order_item;
                $order_item->order_id = $order->id;
                $order_item->product_id = $item->product_id;
                $order_item->quantity = $item->quantity;
                $order_item->save();
            }
            foreach ($items as $item) {
                $product = Product::find($item->product_id);
                $product->quantity -= $item->quantity;
                $product->save();
            }
            cart::where('user_id', auth()->id())->delete();
            Delivery::create([
                'status' => false,
                'address' => auth()->user()->address,
                'phoneNumber' => auth()->user()->phonenumber,
                'city' => auth()->user()->city,
                'order_id' => $order->id,
            ]);
            return to_route('orders.index')->with('success', 'order has been created');
        } else {
            foreach($items as $item){
                if($item->product->quantity <$item->quantity){
                    $item->quantity=$item->product->quantity;
                    $item->save();
                }
            }
            return back()->with('failed', 'the quantity does not match the exists prices update');
        }
    }
    public function dropOrder(Order $order)
    {
        foreach ($order->order_items as $value) {
            $value->product->quantity += $value->quantity;
            $value->product->save();
            $value->delete();
        }
        $order->delete();
        if (Order::count()) {
            return back()->with("success", "order deleted successfully");
        }
        return redirect('/#overview')->with("warning", "order deleted successfully put the right order");
    }
    public function buynow(Request $request)
    {
        if(auth()->check()){
            $product = Product::find($request->product_id);
            $order = new Order();
            $order->user_id = auth()->id();
            $order->total = str_replace('DH', '', $product->price) * $request->quantity;
            $order->save();
            $order_item = new Order_item();
            $order_item->order_id = $order->id;
            $order_item->product_id = $product->id;
            $order_item->quantity = $request->quantity;
            $order_item->save();
            Delivery::create([
                'status' => false,
                'address' => auth()->user()->address,
                'phoneNumber' => auth()->user()->phonenumber,
                'city' => auth()->user()->city,
                'order_id' => $order->id,
            ]);
            return to_route('orders.index')->with('success', "order created successfully");
        }
    }
}
