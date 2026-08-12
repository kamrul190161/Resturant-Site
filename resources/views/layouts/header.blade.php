<!-- TOP BAR -->
<div id="topbar">
    <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="top-contact d-flex flex-wrap">
            <span><i class="fas fa-phone-alt"></i>01832862376</span>
            <span><i class="fas fa-envelope"></i>mdkamrul527527@gmail.com</span>
            <span><i class="fas fa-map-marker-alt"></i>1133/c,patwarybill,adabor</span>
        </div>
        <div class="d-flex align-items-center gap-3">
            <span class="ttag"><i class="fas fa-fire me-1"></i>Free Delivery Today!</span>
            <div class="tsoc">
                <a href="https://www.facebook.com/?_rdc=1&_rdr#"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.facebook.com/?_rdc=1&_rdr#"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/?_rdc=1&_rdr#"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.facebook.com/?_rdc=1&_rdr#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg" id="nav">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        <div class="blogo">
            <div class="bico"><i class="fas fa-utensils"></i></div>
            <div>
                <div class="bname">Kam<span>rul</span></div>
                <div class="bsub">Fast Food & Restaurant</div>
            </div>
        </div>
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <i class="fas fa-bars" style="color:var(--primary);font-size:1.35rem;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/chefs') }}">Chefs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/reservation') }}">Reservation</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/reviews') }}">Reviews</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <div class="d-flex align-items-center gap-1">
            <button id="navSearchBtn" title="Search"><i class="fas fa-search"></i></button>
            <a href="{{ url('/menu') }}" class="nav-link nav-cta"><i class="fas fa-shopping-bag me-1"></i>Order Now</a>
        </div>
    </div>
    </div>
</nav>

<!-- SEARCH OVERLAY POPUP -->
<div id="searchOv">
    <button class="sovclose" id="searchClose"><i class="fas fa-times"></i></button>
    <div class="sovbox">
    <h4>What are you craving today?</h4>
    <div class="sovinput">
        <input type="text" id="searchInput" placeholder="Search burgers, pizza, chicken..." autocomplete="off"/>
        <button><i class="fas fa-search"></i></button>
    </div>
    <div class="sovcats">
        <div class="sovcat active" data-cat="all"><img src="{{ asset('img/menu/1.jpg') }}" alt=""/>All Items</div>
        <div class="sovcat" data-cat="burgers"><img src="{{ asset('img/menu/1.jpg') }}" alt=""/>Burgers</div>
        <div class="sovcat" data-cat="pizza"><img src="{{ asset('img/menu/2.jpg') }}" alt=""/>Pizza</div>
        <div class="sovcat" data-cat="chicken"><img src="{{ asset('img/menu/3.jpg') }}" alt=""/>Chicken</div>
        <div class="sovcat" data-cat="wraps"><img src="{{ asset('img/menu/4.jpg') }}" alt=""/>Wraps</div>
        <div class="sovcat" data-cat="pasta"><img src="{{ asset('img/menu/5.jpg') }}" alt=""/>Pasta</div>
        <div class="sovcat" data-cat="desserts"><img src="{{ asset('img/menu/6.jpg') }}" alt=""/>Desserts</div>
    </div>
    <div class="sovtrend">
        <p><i class="fas fa-fire me-1" style="color:var(--secondary);"></i>Trending Searches</p>
        <span class="ttag">Smash Burger</span>
        <span class="ttag">Nashville Chicken</span>
        <span class="ttag">Truffle Pizza</span>
        <span class="ttag">Lava Cake</span>
        <span class="ttag">Loaded Fries</span>
        <span class="ttag">Mango Shake</span>
    </div>
    </div>
</div>