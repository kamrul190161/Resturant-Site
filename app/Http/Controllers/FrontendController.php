<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food; 
use App\Models\Order;
use App\Models\OrderItem; // নতুন যোগ করা হলো

class FrontendController extends Controller
{
    // মেনু পেজ দেখানোর জন্য
    public function index()
    {
        $foods = Food::where('status', 1)->latest()->get();
        return view('menu.menu', compact('foods')); 
    }

    // কার্টে খাবার যোগ করার জন্য
    public function addToCart(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $food->name,
                "quantity" => 1,
                "price" => $food->price,
                "image" => $food->image
            ];
        }

        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Food added to cart successfully!');
    }

    // চেকআউট পেজ দেখানোর জন্য
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if(empty($cart)){
             return redirect('/menu')->with('error', 'Your cart is empty!');
        }

        return view('frontend.checkout', compact('cart'));
    }

    // অর্ডার প্লেস (Submit) করার জন্য
    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'delivery_address' => 'required|string',
        ]);

        $cart = session()->get('cart');
        
        if(!$cart){
            return redirect('/menu');
        }

        $totalAmount = 0;
        foreach($cart as $item){
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // ১. আগে মূল অর্ডারটি সেভ করা হলো
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'delivery_address' => $request->delivery_address,
            'total_amount' => $totalAmount,
            'status' => 'pending' 
        ]);

        // ২. এবার কার্টের প্রতিটি খাবার OrderItem টেবিলে সেভ করা হলো
        foreach($cart as $id => $item){
            OrderItem::create([
                'order_id' => $order->id,
                'food_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');

        // আগের রিডাইরেক্ট চেঞ্জ করে আমাদের নতুন স্লিপ পেজে পাঠিয়ে দিলাম
        return redirect()->route('order.success', $order->id);
    }

    // অর্ডার কমপ্লিট হওয়ার পর স্লিপ দেখানোর নতুন ফাংশন
    public function orderSuccess($id)
    {
        // ডেটাবেস থেকে অর্ডার এবং অর্ডার করা আইটেমগুলো নিয়ে আসা হলো
        $order = Order::with('orderItems')->findOrFail($id);
        
        // ফ্রন্টএন্ডে একটি নতুন ইনভয়েস ভিউ রিটার্ন করছি
        return view('frontend.invoice', compact('order'));
    }
}