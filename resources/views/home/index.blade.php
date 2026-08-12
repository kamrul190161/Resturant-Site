@extends('layouts.master')

@section('content')
<!-- HERO -->
<section id="hero">
    <div class="hs hs1"></div>
    <div class="hs hs2"></div>
    <div class="hbgtxt">FOOD</div>
    <div class="container">
    <div class="row align-items-center g-5" style="min-height:88vh;">
        <div class="col-lg-6">
            <div class="hbadge"><div class="hbi"><i class="fas fa-star"></i></div><span>1133/c,Road No 1,adabor,Mohammedpur</span></div>
            <h1 class="htitle">Delicious <span class="hl">Fast Food</span><br/>for Every Moment</h1>
            <p class="hdesc">Experience bold flavors crafted from premium ingredients. From crispy burgers to gourmet pizzas - every bite is an adventure worth savoring.</p>
            <div class="d-flex flex-wrap gap-3 mb-2">
                <a href="{{ url('/menu') }}" class="btn-red"><i class="fas fa-utensils"></i>Explore Menu</a>
                <a href="https://www.youtube.com/watch?v=RXv_uIN6e-Y" class="magnific_popup btn-play popup-youtube"><div class="pico"><i class="fas fa-play"></i></div><span>Watch Our Story</span></a>
            </div>
        </div>
        <div class="col-lg-6">
            <div style="position:relative;text-align:center;">
                <div class="hcircle"><img src="{{ asset('img/banner-img.jpg') }}" alt="Burger"/></div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- CATEGORY -->
<section id="category">
    <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
        <span class="slbl">What We Offer</span>
        <h2 class="stitle">Browse by <span>Category</span></h2>
        <div class="sline"></div>
    </div>

     <div class="row g-3 justify-content-center">
        <!-- Categories -->
        <div class="col-6 col-sm-4 col-md-3 col-lg-2"><div class="catcard active"><img class="catimg" src="{{ asset('img/category/1.jpg') }}" alt=""/><div class="catnm">All Items</div></div></div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2"><div class="catcard"><img class="catimg" src="{{ asset('img/category/2.jpg') }}" alt=""/><div class="catnm">Burgers</div></div></div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2"><div class="catcard"><img class="catimg" src="{{ asset('img/category/3.jpg') }}" alt=""/><div class="catnm">Pizza</div></div></div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2"><div class="catcard"><img class="catimg" src="{{ asset('img/category/4.jpg') }}" alt=""/><div class="catnm">Fried Chicken</div></div></div>
    </div>
                    
    </div>
</section>

<!-- SPECIAL OFFER -->
<section id="special">
    <div class="spbg"></div>
    <div class="container" style="position:relative;z-index:2;">
    <div class="row align-items-center g-5">
        <div class="col-lg-6" data-aos="fade-right">
            <div class="sptag"><i class="fas fa-bolt me-1"></i>Limited Time Offer</div>
            <h2 class="sptitle">Get 30% Off<br/>Our Signature<br/><span>Burger</span> Meal</h2>
            <a href="{{ url('/menu') }}" class="btn-red"><i class="fas fa-shopping-cart"></i>Grab the Deal</a>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
            <div class="spimgw">
                <div class="spglow"></div>
                <div class="sppbdg"><span class="old">$24.99</span><span class="np">$17.49</span></div>
                <img src="{{ asset('img/off-img.jpg') }}" alt="Special Burger"/>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection