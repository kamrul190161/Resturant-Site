@extends('layouts.master')

@section('content')
<section id="menu" style="padding-top: 120px; padding-bottom: 80px;">
    <div class="container">
        
        <!-- সাকসেস মেসেজ দেখানোর জন্য (কার্টে অ্যাড হলে এটি দেখাবে) -->
        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 30px; border: 1px solid #c3e6cb; text-align: center; font-weight: bold;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <a href="{{ route('checkout') }}" style="color: #0b2e13; text-decoration: underline; margin-left: 10px;">Go to Checkout</a>
            </div>
        @endif

        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">What's Cooking</span>
            <h2 class="stitle">Our Delicious <span>Menu</span></h2>
            <div class="sline"></div>
        </div>
        
        <!-- Dynamic Category Filters -->
        <div class="text-center mb-4" data-aos="fade-up">
            <button class="filtbtn active" data-f="all">All</button>
            @php
                // আমরা ফুড লিস্ট থেকে ইউনিক ক্যাটাগরিগুলো বের করে নিচ্ছি ফিল্টার বাটনের জন্য
                $uniqueCategories = $foods->pluck('category')->filter()->unique('id');
            @endphp
            
            @foreach($uniqueCategories as $cat)
                <button class="filtbtn" data-f="{{ strtolower($cat->slug ?? $cat->name) }}">{{ $cat->name }}</button>
            @endforeach
        </div>

        <!-- Dynamic Food Items Grid -->
        <div class="row g-4" id="mgrid">
            @foreach($foods as $food)
            <div class="col-sm-6 col-lg-4 mwrap" data-c="{{ strtolower($food->category->slug ?? $food->category->name ?? 'all') }}" data-aos="fade-up">
                
                <div class="mcard" 
                     data-img="{{ $food->image ? asset('uploads/food/'.$food->image) : asset('img/placeholder.jpg') }}" 
                     data-title="{{ $food->name }}" 
                     data-price="${{ $food->price }}">
                
                    <div class="mimg">
                        <img src="{{ $food->image ? asset('uploads/food/'.$food->image) : asset('img/placeholder.jpg') }}" alt="{{ $food->name }}"/>
                        
                        @if($loop->iteration <= 3)
                            <div class="mbdg hot"><i class="fas fa-star"></i> New</div>
                        @endif
                    </div>
                    
                    <div class="mbody">
                        <div class="mcat">{{ $food->category->name ?? 'Uncategorized' }}</div>
                        <div class="mtit">{{ $food->name }}</div>
                        <div class="mfoot">
                            <div>
                                <div class="mprice">${{ $food->price }}</div>
                            </div>
                            
                            <!-- এখানে button এর বদলে a (link) ট্যাগ ব্যবহার করা হয়েছে -->
                            <a href="{{ route('add.to.cart', $food->id) }}" title="Add to Cart" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: #ff4a52; color: #fff; text-decoration: none; transition: 0.3s;">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection