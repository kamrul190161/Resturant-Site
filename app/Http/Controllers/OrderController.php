<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // with('orderItems') ব্যবহার করে অর্ডারের সাথে তার ভেতরের খাবারগুলোও ডেটাবেস থেকে নিয়ে আসা হলো
        $orders = Order::with('orderItems')->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    // স্ট্যাটাস আপডেট করার নতুন ফাংশন
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status; // ড্রপডাউন থেকে আসা স্ট্যাটাস ডেটাবেসে সেভ হবে
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    // নতুন অর্ডার চেক করার ফাংশন (Background এ কাজ করবে)
    public function checkNewOrder()
    {
        $latest = \App\Models\Order::latest()->first();
        return response()->json([
            'id' => $latest ? $latest->id : 0,
            'customer' => $latest ? $latest->customer_name : ''
        ]);
    }
}