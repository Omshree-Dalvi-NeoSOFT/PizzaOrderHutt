<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\Menu;
use App\Models\Order;
use App\Http\Controllers\Number;
use App\Models\OrderProducts;
use Illuminate\Support\Facades\Mail;

class Operation extends Controller
{
    public function index()
    {
        $products = Menu::all();
        return view('layout.dasboard', compact('products'));
    }

    public function cart()
    {
        return view('layout.cart');
    }

    public function addToCart($id)
    {
        $product = Menu::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkOut($total){
        $val=$total;
        return view('layout.checkout',['total'=>$val]);
    }

    public function PostOrder(Request $req){
        $validate = $req->validate([
            'ccdetail' => "required|min:16"
        ]);
        if($validate){
            $customer=session('user');
            $cid=$customer->id;
            $useremail=$customer->email;
            $product=session()->get('cart', []);
            $order = new Order();
            $order->cid=$cid;
            $order->total=$req->total;
            $order->ccdetails=$req->ccdetail;
            $order->save();
            $oid=Order::where('cid',$cid)->get('id');
            foreach($oid as $o){
                $sid=$o["id"];
            }
            $req->session()->put('orderid',$sid);
            foreach($product as $key=>$k){
                $id = $key;
                $orderproduct = new OrderProducts();
                $orderproduct->oid = $sid;
                $orderproduct->pname = $product[$id]["name"];
                $orderproduct->price = $product[$id]["price"];
                $orderproduct->quantity = $product[$id]["quantity"];
                $orderproduct->imae = $product[$id]["image"];
                $orderproduct->save();
            }
            $req->session()->forget('cart');
            $order=Order::where('cid',$cid)->latest()->first();
            $orderid=$order->id;
            $product=OrderProducts::where('oid',$orderid)->get();
            $data=['order'=>$order,'orderproducts'=>$product];
            $user['to']=$useremail;
            Mail::send('layout/mail',$data,function($message) use ($user){
                $message->to($user['to']);
                $message->subject("Order Confirmation Mail | PizzaHut");
            });
            return view('layout.success'); 
        }
    }

    public function myOrder(){
        $user=session('user');
        $uid=$user->id;
        $order=Order::where('cid',$uid)->latest()->first();
        $orderid=$order->id;
        $orderproducts=OrderProducts::where('oid',$orderid)->get();
        return view('layout.myorder',['order'=>$order],compact('orderproducts'));
    }
}
