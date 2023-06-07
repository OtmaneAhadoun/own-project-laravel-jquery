<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $product = Product::find($request->product_id);
            $request['quantity'] = (int)$request->quantity;
            if ($request->quantity > $product->quantity) {
                return back()->with('failed', 'quantity does not match the exists');
            } else {
                $isthere = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();
                if (!$isthere) {
                    Cart::create($request->all());
                    return back()->with('success', 'product added sucessfully');
                } else {
                    if (($isthere->quantity + $request->quantity) <= $product->quantity) {
                        $isthere->quantity += $request->quantity;
                        $isthere->save();
                        return back()->with('success', 'quantity updated');
                    } else {
                        return back()->with('failed', 'quantity does not match the exists');
                    }
                }
            }
        } else {
            $product = Product::find($request->product_id);
            if($product->quantity==0){
                return redirect('/')->with('failed','the product has been sold');
            }
            $cart = session()->get('cart');
            if(!$cart){
                $cart=[$request->product_id=>['product'=>$product,'quantity'=>$request->quantity]];
                session()->put('cart',$cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!!');
            }
            if(isset($cart[$request->product_id])){
                if(($request->quantity+$cart[$request->product_id]['quantity'])<=$product->quantity){
                    $cart[$request->product_id]['quantity']+=$request->quantity;
                    session()->put('cart',$cart);
                    return redirect()->back()->with('success', 'quantity change successfully!');
                }else{
                    return redirect()->back()->with('failed', 'quantity miss match!');
                }
            }
            $cart[$request->product_id]=[
                'product'=>$product,
                'quantity'=>$request->quantity
            ];
            session()->put('cart',$cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
    public function delete(Request $request,$cart)
    {
        if(Auth::check()){
            $cart_deleted=Cart::where("product_id",$cart)->where('user_id',auth()->id());
            $cart_deleted->delete();
            return back()->with('success', 'Product deleted successfully');
        }
        $cart_session=session()->get('cart');
        if(isset($cart_session[$cart])){
            unset($cart_session[$cart]);
            session()->put('cart',$cart_session);
            return back()->with('success', 'Product deleted successfully');
        }else{
            abort(404);
        }
    }
    public function clearCart()
    {
        if(Auth::check()){
            Cart::truncate();
            return back()->with('success', 'clear successfully');
        }
        session()->put('cart',[]);
        return back()->with('success', 'clear successfully');
    }
    public function updateCart(Request $request)
    {
        $implement = false;
        if(auth()->check()){
            foreach ($request->post() as $id => $quantity) {
                if (gettype($id) != 'string') {
                    $productCart = Cart::where('user_id', auth()->id())->where('id', $id)->with('product')->first();
                    if ($quantity <= $productCart->product->quantity) {
                        $productCart->update(['quantity' => $quantity]);
                        $implement = true;
                    }
                }
            }
        }else{
            $productCart = session()->get('cart');
            foreach ($request->post() as $id=>$quantity) {
                if (gettype($id) != 'string') {
                    foreach($productCart as &$product){
                        if($product['product']->id==$id){  
                            if ($quantity<=$product['product']->quantity) {
                                $product['quantity']=$quantity;
                                $implement = true;
                            }
                        }
                    }
                }
            }
            session()->put('cart',$productCart);
        }
        if ($implement) {
            return back()->with('success', 'cart updated successfully');
        }
        return back()->with('failed', 'quantity does not match the exists');
    }
}
