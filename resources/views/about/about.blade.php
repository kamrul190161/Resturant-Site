@extends('layouts.master')

@section('content')
<!-- ABOUT -->
<section id="about" style="padding-top: 120px;">
    <div class="container">
    <div class="row align-items-center g-5">
        <div class="col-lg-5" data-aos="fade-right">
            <div class="astack">
                <div class="aexp"><span class="anum">12+</span><small>Years of<br/>Excellence</small></div>
                <div class="amain"><img src="{{ asset('img/about1.jpg') }}" alt="Restaurant"/></div>
                <div class="asm"><img src="{{ asset('img/about2.jpg') }}" alt=""/></div>
            </div>
        </div>
        <div class="col-lg-7" data-aos="fade-left">
            <span class="slbl">Our Story</span>
            <h2 class="stitle text-start">We Invite You to Visit<br/>Our <span>Food Restaurant</span></h2>
            <div class="sline lft"></div>
            <p class="sdesc mb-4">Founded in 2026, Hasan began as a small corner joint with a big dream - to serve food that brings people together. Today we're proud to serve thousands of happy customers every week with the same passion that started it all.</p>
            <a href="{{ url('/menu') }}" class="btn-red"><i class="fas fa-book-open"></i>View Full Menu</a>
        </div>
    </div>
    </div>
</section>

<!-- HISTORY -->
<section id="history">
    <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
        <span class="slbl">Our Journey</span>
        <h2 class="stitle">A History of <span>Restaurant</span></h2>
        <div class="sline"></div>
    </div>
    <div class="timeline" data-aos="fade-up">
        <div class="tli">
            <div class="tl-left">
                <div class="tlyear">2026</div>
                <h5>Evolution of Restaurants</h5>
                <p>Kamrul opens its first 20-seat diner on Flavor Street. Within 3 months, lines stretch around the block every evening.</p>
            </div>
            <div class="tl-center"><div class="tldot"></div></div>
            <div class="tl-right">
                <div class="tlyear">2026</div>
                <h5>Evolution of Restaurants</h5>
                <p>Kamrul opens its first 20-seat diner on Flavor Street. Within 3 months, lines stretch around the block every evening.</p>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection