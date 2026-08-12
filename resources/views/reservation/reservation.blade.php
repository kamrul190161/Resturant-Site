@extends('layouts.master')

@section('content')
<!-- RESERVATION FORM -->
<section id="reservation" style="padding-top: 120px; padding-bottom: 80px;">
    <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
        <span class="slbl">Book a Table</span>
        <h2 class="stitle">Make a <span>Reservation</span></h2>
        <div class="sline"></div>
        <p class="sdesc mx-auto" style="max-width:480px;">Reserve your table for a memorable dining experience. We recommend booking 24 hours in advance for weekend evenings.</p>
    </div>

    <!-- সাবমিট সফল হলে এই মেসেজটি দেখাবে -->
    @if(session('success'))
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 8px; border: 1px solid #c3e6cb; font-weight: bold;">
                    <i class="fas fa-check-circle" style="margin-right: 5px;"></i> {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row g-4 align-items-start">
        <div class="col-lg-4" data-aos="fade-right">
            <div style="background:var(--dark);border-radius:18px;padding:36px;">
                <h4 style="color:#fff;font-size:1.3rem;margin-bottom:8px;">Contact Info</h4>
                <p style="color:rgba(255,255,255,.55);font-size:.85rem;margin-bottom:26px;">We're happy to help you plan the perfect dining experience.</p>
                <div class="d-flex flex-column gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div style="width:46px;height:46px;border-radius:11px;background:rgba(232,40,26,.2);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0;"><i class="fas fa-clock"></i></div>
                    <div><strong style="display:block;color:#ccc;font-size:.78rem;text-transform:uppercase;letter-spacing:.8px;">Opening Hours</strong><span style="color:#fff;font-size:.87rem;">Wed - Sun, 9 AM - 11 PM</span></div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div style="width:46px;height:46px;border-radius:11px;background:rgba(232,40,26,.2);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0;"><i class="fas fa-phone-alt"></i></div>
                    <div><strong style="display:block;color:#ccc;font-size:.78rem;text-transform:uppercase;letter-spacing:.8px;">Call for Booking</strong><span style="color:#fff;font-size:.87rem;">01832862376</span></div>
                </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8" data-aos="fade-left">
            <div class="fcard">
                
                <!-- লারাভেল ফর্ম শুরু -->
                <form action="{{ route('reservation.submit') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="flbl">Full Name *</label>
                            <input type="text" name="name" class="fctrl" placeholder="John Doe" required/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Phone Number *</label>
                            <input type="tel" name="phone" class="fctrl" placeholder="+1 (800) 000-0000" required/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Email Address *</label>
                            <input type="email" name="email" class="fctrl" placeholder="you@email.com" required/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Number of Guests *</label>
                            <select name="guests" class="fctrl" required>
                                <option value="1 Person">1 Person</option>
                                <option value="2 People">2 People</option>
                                <option value="3 - 4 People">3 - 4 People</option>
                                <option value="5+ People">5+</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Date *</label>
                            <input type="date" name="date" class="fctrl" required/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Time *</label>
                            <select name="time" class="fctrl" required>
                                <option value="09:00 AM">09:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="06:00 PM">06:00 PM</option>
                                <option value="08:00 PM">08:00 PM</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="flbl">Special Requests</label>
                            <textarea name="special_requests" class="fctrl" rows="3" placeholder="Allergies, dietary needs, special occasions..."></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-red w-100 justify-content-center" id="resBtn" style="border: none; cursor: pointer;">
                                <i class="fas fa-calendar-check" style="margin-right: 5px;"></i>Confirm Reservation
                            </button>
                        </div>
                    </div>
                </form>
                <!-- লারাভেল ফর্ম শেষ -->

            </div>
        </div>
    </div>
    </div>
</section>
@endsection