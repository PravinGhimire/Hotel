<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\RoomDetailsController;
use App\Http\Controllers\signupcontroller;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Models\Resturant;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'index']);
Route::get('/header', [PagesController::class, 'header']);
Route::get('/footer', [PagesController::class, 'footer']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/room', [PagesController::class, 'room']);
Route::get('/room1', [PagesController::class, 'room1']);
Route::get('{id}/rums/', [PagesController::class, 'rums'])->name('rums');
Route::post('{id}/rums/', [PagesController::class, 'rums'])->name('rums');
Route::get('/gallerys', [PagesController::class, 'gallerys']);
Route::get('/bookingview', [PagesController::class, 'bookingview'])->name('bookingview');
Route::get('/resturant', [PagesController::class, 'resturant'])->name('resturant');
Route::post('/check-Availability', [AvailabilityController::class, 'checkAvailability'])->name('checkAvailability');
Route::post('/check-availability', [RoomController::class, 'checkAvailability'])->name('availability.check');

Route::post('/room-availability', [RoomDetailsController::class,'checkRoomAvailability'])->name('roomAvailability');
Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('booking.checkAvailability');

// Route to process availability check
// Middleware group for authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');

    // Rooms
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms/store', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}/update', [RoomController::class, 'update'])->name('rooms.update');
    Route::post('/rooms/delete', [RoomController::class, 'delete'])->name('rooms.delete');

    // Users
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('user.delete');

    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/{gallery}/update', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/gallery/delete', [GalleryController::class, 'delete'])->name('gallery.delete');

    // Sliders
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{slider}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/{slider}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::post('/slider/delete', [SliderController::class, 'delete'])->name('slider.delete');

    // Room Details
    Route::get('/roomdetails', [RoomDetailsController::class, 'index'])->name('roomdetails.index');
    Route::get('/roomdetails/create', [RoomDetailsController::class, 'create'])->name('roomdetails.create');
    Route::post('/roomdetails/store', [RoomDetailsController::class, 'store'])->name('roomdetails.store');
    Route::get('/roomdetails/{roomdetails}/edit', [RoomDetailsController::class, 'edit'])->name('roomdetails.edit');
    Route::post('/roomdetails/{roomdetails}/update', [RoomDetailsController::class, 'update'])->name('roomdetails.update');
    Route::post('/roomdetails/delete', [RoomDetailsController::class, 'delete'])->name('roomdetails.delete');

    // Booking Records
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');

    Route::get('booking/show', [BookingController::class, 'show'])->name('booking.show');
    Route::get('userbook', [BookingController::class, 'userbook'])->name('userbook');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/booking/{id}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    Route::post('/booking/delete', [BookingController::class, 'delete'])->name('booking.delete');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::post('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');

   

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for Resturant management
    Route::get('/resturants', [ResturantController::class, 'index'])->name('resturant.index');
    Route::get('/resturant/details', [ResturantController::class, 'details'])->name('resturant.details');

    Route::get('/resturants/create', [ResturantController::class, 'create'])->name('resturant.create');
    Route::post('/resturants', [ResturantController::class, 'store'])->name('resturant.store');
    Route::get('/resturants/{id}/edit', [ResturantController::class, 'edit'])->name('resturant.edit');
    Route::post('/resturants/{id}/update', [ResturantController::class, 'update'])->name('resturant.update');
    Route::post('/resturant/delete', [ResturantController::class, 'delete'])->name('resturant.delete');

    // Food Ordering
    // In your web.php or appropriate routes file
Route::get('/resturant/{id}/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/resturant/{id}/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders/details', [OrderController::class, 'details'])->name('orders.details');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::resource('orders', OrderController::class);
    Route::get('/orders/{order}/invoice', [OrderController::class, 'generateInvoice'])->name('orders.invoice');
  //amenties
    Route::get('/amenities', [AmenityController::class, 'index'])->name('amenities.index');
    Route::get('/amenities/create', [AmenityController::class, 'create'])->name('amenities.create');
    Route::post('/amenities', [AmenityController::class, 'store'])->name('amenities.store');
    Route::post('amenities/delete', [AmenityController::class, 'destroy'])->name('amenities.destroy');
    Route::get('/amenities/{amenity}/edit', [AmenityController::class, 'edit'])->name('amenities.edit');
    Route::put('/amenities/{amenity}', [AmenityController::class, 'update'])->name('amenities.update');

});

require __DIR__.'/auth.php';
