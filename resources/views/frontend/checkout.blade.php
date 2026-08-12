@extends('layouts.master')

@section('content')
<section style="padding-top: 120px; padding-bottom: 50px;">
    <div class="container">
        <h2 class="text-center mb-4">Checkout Process</h2>
        
        <div class="row">
            <!-- ফর্মের অংশ -->
            <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0">
                    <h4 class="mb-3">Delivery Details</h4>
                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="customer_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" name="customer_phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Delivery Address</label>
                            <textarea name="delivery_address" rows="3" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Confirm Order</button>
                    </form>
                </div>
            </div>

            <!-- কার্টের আইটেম দেখানোর অংশ -->
            <div class="col-md-6">
                <div class="card p-4 shadow-sm border-0 bg-light">
                    <h4 class="mb-3">Your Order</h4>
                    <ul class="list-group mb-3">
                        @php $total = 0; @endphp
                        
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $details['name'] }}</h6>
                                    <small class="text-muted">Quantity: {{ $details['quantity'] }}</small>
                                </div>
                                <span class="text-muted">${{ $details['price'] * $details['quantity'] }}</span>
                            </li>
                        @endforeach
                        
                        <li class="list-group-item d-flex justify-content-between bg-white mt-2">
                            <span>Total (USD)</span>
                            <strong>${{ $total }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection