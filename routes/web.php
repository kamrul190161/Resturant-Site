

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FrontendController;

// আলাদা কন্ট্রোলার দিয়ে রাউটিং
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/chefs', [ChefController::class, 'index'])->name('chefs');
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'showContactPage'])->name('contact'); 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

require __DIR__.'/auth.php';

#food contoller
// Food Items Routes
Route::get('/food', [FoodController::class, 'index'])->name('food.index');
Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
Route::post('/food/store', [FoodController::class, 'store'])->name('food.store');
Route::get('/food/edit/{id}', [FoodController::class, 'edit'])->name('food.edit');
Route::put('/food/update/{id}', [FoodController::class, 'update'])->name('food.update');
Route::delete('/food/delete/{id}', [FoodController::class, 'destroy'])->name('food.destroy');


// আগের Route::get('/', ...) থাকলে সেটি মুছে নিচেরটি দিন
Route::get('/menu/', [FrontendController::class, 'index'])->name('home');

#menu section 
use App\Models\Food; // এটি ফাইলের একদম উপরে use করা না থাকলে উপরে বসাবেন

Route::get('/menu', function () {
    // ডেটাবেস থেকে সব Active খাবারগুলো নিয়ে আসছি
    $foods = Food::with('category')->where('status', 1)->latest()->get();
    
    // view এর ভেতরে আপনার ফোল্ডারের নাম ঠিক রাখবেন। 
    // ছবির এরর অনুযায়ী আপনার ফাইলের নাম resources/views/menu/menu.blade.php
    return view('menu.menu', compact('foods'));
});

// কার্টে খাবার যোগ করার জন্য
Route::get('/add-to-cart/{id}', [App\Http\Controllers\FrontendController::class, 'addToCart'])->name('add.to.cart');

// চেকআউট পেজ দেখানোর জন্য
Route::get('/checkout', [App\Http\Controllers\FrontendController::class, 'checkout'])->name('checkout');

// অর্ডার সাবমিট করার জন্য
Route::post('/place-order', [App\Http\Controllers\FrontendController::class, 'placeOrder'])->name('place.order');

// Admin Order Route
Route::get('/admin/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('admin.orders');
Route::post('/admin/orders/{id}/status', [App\Http\Controllers\OrderController::class, 'updateStatus'])->name('admin.orders.status');
Route::get('/order-success/{id}', [App\Http\Controllers\FrontendController::class, 'orderSuccess'])->name('order.success');
Route::get('/admin/check-new-order', [App\Http\Controllers\OrderController::class, 'checkNewOrder'])->name('admin.check.order');

// Contact Messages Routes
Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
Route::get('/admin/messages', [App\Http\Controllers\ContactController::class, 'index'])->name('admin.messages');
Route::post('/admin/messages/{id}/read', [App\Http\Controllers\ContactController::class, 'markAsRead'])->name('admin.messages.read');

// কাস্টমারদের ফর্ম সাবমিট করার রাউট
Route::post('/reservation/submit', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.submit');

// অ্যাডমিন প্যানেলে রিজার্ভেশন দেখার রাউট (adminIndex কল করা হয়েছে)
Route::get('/admin/reservations', [App\Http\Controllers\ReservationController::class, 'adminIndex'])->name('admin.reservations');

// অ্যাডমিন প্যানেলে স্ট্যাটাস আপডেট করার রাউট
Route::post('/admin/reservations/{id}/status', [App\Http\Controllers\ReservationController::class, 'updateStatus'])->name('admin.reservations.status');