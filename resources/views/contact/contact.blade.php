@extends('layouts.master')

@section('content')
<!-- CONTACT FORM -->
<section id="contact-section" style="padding-top: 120px; padding-bottom: 80px;">
    <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
        <span class="slbl">Get In Touch</span>
        <h2 class="stitle">Contact <span>Us</span></h2>
        <div class="sline"></div>
        <p class="sdesc mx-auto" style="max-width:480px;">Have a question, feedback, or want to plan a special event? We'd love to hear from you.</p>
    </div>

    <!-- মেসেজ সাকসেসফুলি সেন্ড হলে এই মেসেজটি দেখাবে -->
    @if(session('success'))
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; border: 1px solid #c3e6cb; font-weight: bold;">
                    <i class="fas fa-check-circle" style="margin-right: 5px;"></i> {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-right">
            <div class="ctdark">
                <h4>Let's Talk</h4>
                <p class="ctsub">We typically respond within 2 hours during business hours.</p>
                <div class="ctitem">
                <div class="cticon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="ctinfo"><strong>Address</strong><span>Adabor,road 1,<br/>Mohammedpur</span></div>
                </div>
                <div class="ctitem">
                <div class="cticon"><i class="fas fa-phone-alt"></i></div>
                <div class="ctinfo"><strong>Phone</strong><span>01832862376</span></div>
                </div>
                <div class="ctitem">
                <div class="cticon"><i class="fas fa-envelope"></i></div>
                <div class="ctinfo"><strong>Email</strong><span>mdkamrul527527@gmail.com</span></div>
                </div>
                <div class="ctsocrow">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8" data-aos="fade-left">
            <div class="fcard">
                
                <!-- লারাভেল ফর্ম শুরু -->
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="flbl">Your Name *</label>
                            <input type="text" name="name" class="fctrl" placeholder="John Doe" required/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Email Address *</label>
                            <input type="email" name="email" class="fctrl" placeholder="you@email.com" required/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Phone Number</label>
                            <input type="tel" name="phone" class="fctrl" placeholder="+1 (800) 000-0000"/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">Subject *</label>
                            <select name="subject" class="fctrl" required>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Catering &amp; Events">Catering &amp; Events</option>
                                <option value="Feedback">Feedback</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="flbl">Message *</label>
                            <textarea name="message" class="fctrl" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-red" id="ctcBtn" style="border: none; cursor: pointer;">
                                <i class="fas fa-paper-plane" style="margin-right: 5px;"></i>Send Message
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