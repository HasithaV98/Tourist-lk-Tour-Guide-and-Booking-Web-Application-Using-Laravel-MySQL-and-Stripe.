<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/',[HomeController::class,'index']);

Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('addguiders',[AdminController::class,'addguiders']);
Route::post('addguider',[AdminController::class,'addguider']);
Route::get('destinations',[AdminController::class,'destinations']);
Route::post('add_destination',[AdminController::class,'add_destination']);
Route::get('packages',[AdminController::class,'packages']);
Route::post('addpackage',[AdminController::class,'addpackage']);
Route::get('go_booking',[HomeController::class,'go_booking']);
Route::post('booking/{id}',[HomeController::class,'booking']);
Route::get('go_booking',[HomeController::class,'go_booking']);
Route::post('customized_booking/{id}',[HomeController::class,'customized_booking']);
Route::get('my_bookings',[HomeController::class,'my_bookings']);
Route::get('booking_cancel/{id}',[HomeController::class,'booking_cancel']);
Route::get('checkout/{price}',[HomeController::class,'checkout']);
Route::post('stripe/{price}',[HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('bookings',[AdminController::class,'bookings']);
Route::get('deletepackage/{id}',[AdminController::class,'deletepackage']);
Route::get('updatepackage/{id}',[AdminController::class,'updatepackage']);
Route::post('updatedpackage/{id}',[AdminController::class,'updatedpackage']);
Route::get('deleteguider/{id}',[AdminController::class,'deleteguider']);
Route::get('updateguider/{id}',[AdminController::class,'updateguider']);
Route::post('updatedguider/{id}',[AdminController::class,'updatedguider']);
Route::get('deletelocation/{id}',[AdminController::class,'deletelocation']);
Route::get('updatelocation/{id}',[AdminController::class,'updatelocation']);
Route::post('updatedlocation/{id}',[AdminController::class,'updatedlocation']);
Route::get('dashboards',[AdminController::class,'dashboards']);

