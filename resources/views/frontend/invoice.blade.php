@extends('layouts.master')

@section('content')
<section style="padding: 120px 0 80px 0; background-color: #f4f6f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <!-- Invoice Card -->
                <div class="card shadow-lg border-0" id="invoice-slip" style="border-radius: 15px; overflow: hidden;">
                    <!-- Header -->
                    <div class="card-header text-white text-center py-4" style="background-color: #28a745;">
                        <i class="fas fa-check-circle fa-4x mb-3"></i>
                        <h3 class="mb-0 fw-bold">Order Placed Successfully!</h3>
                        <p class="mb-0 mt-1" style="font-size: 1.1rem;">Thank you for your order.</p>
                    </div>
                    
                    <!-- Body -->
                    <div class="card-body p-4 p-md-5 bg-white">
                        <div class="d-flex justify-content-between border-bottom pb-3 mb-4">
                            <div>
                                <h5 class="fw-bold mb-1 text-primary">Order #{{ $order->id }}</h5>
                                <p class="text-muted mb-0 small"><i class="far fa-clock"></i> {{ $order->created_at->format('d M, Y h:i A') }}</p>
                            </div>
                            <div class="text-end">
                                <h5 class="fw-bold mb-1">Customer</h5>
                                <p class="text-muted mb-0 small">{{ $order->customer_name }}<br>{{ $order->customer_phone }}</p>
                            </div>
                        </div>

                        <!-- Ordered Items Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-4">
                                <thead>
                                    <tr class="border-bottom text-uppercase text-muted" style="font-size: 0.85rem;">
                                        <th>Item Name</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td class="fw-bold text-dark">{{ $item->food_name }}</td>
                                        <td class="text-center text-muted">{{ $item->quantity }}x</td>
                                        <td class="text-end fw-semibold text-dark">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Totals -->
                        <div class="d-flex justify-content-between border-top pt-3 mt-3 align-items-center">
                            <h4 class="fw-bold mb-0 text-dark">Total Amount</h4>
                            <h3 class="fw-bold mb-0" style="color: #ff4a52;">${{ number_format($order->total_amount, 2) }}</h3>
                        </div>
                        
                        <!-- Address -->
                        <div class="mt-4 pt-4 border-top">
                            <h6 class="fw-bold text-muted mb-1 text-uppercase" style="font-size: 0.85rem;">Delivery Address:</h6>
                            <p class="mb-0 fw-medium text-dark"><i class="fas fa-map-marker-alt text-danger me-2"></i> {{ $order->delivery_address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Print & Home Buttons (These won't be printed) -->
                <div class="text-center mt-4 d-print-none">
                    <button onclick="window.print()" class="btn btn-dark px-4 py-2 me-3 fw-bold rounded-pill shadow-sm">
                        <i class="fas fa-print me-2"></i> Print Slip
                    </button>
                    <a href="{{ url('/menu') }}" class="btn btn-danger px-4 py-2 fw-bold rounded-pill shadow-sm" style="background-color: #ff4a52; border-color: #ff4a52;">
                        <i class="fas fa-arrow-left me-2"></i> Back to Menu
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Print Specific CSS -->
<style>
    @media print {
        /* প্রিন্ট করার সময় হেডার, ফুটার এবং বাকি সব লুকিয়ে ফেলবে */
        body * { 
            visibility: hidden; 
        }
        /* শুধু ইনভয়েস স্লিপটি দেখাবে */
        #invoice-slip, #invoice-slip * { 
            visibility: visible; 
        }
        #invoice-slip { 
            position: absolute; 
            left: 0; 
            top: 0; 
            width: 100%; 
            box-shadow: none !important; 
            border: 1px solid #ddd;
        }
        .d-print-none { 
            display: none !important; 
        }
        /* প্রিন্টের সময় ব্যাকগ্রাউন্ড কালার ঠিক রাখার জন্য */
        .bg-success { background-color: #28a745 !important; -webkit-print-color-adjust: exact; color: white !important;}
    }
</style>
@endsection