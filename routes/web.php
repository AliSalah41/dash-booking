<?php

use App\Models\Confirm_Ticket;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppContent\Email\EmailController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\AirPortController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Event\ToggleController;
use App\Http\Controllers\AirlineCountryController;

use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Package\PackageController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\AppContent\About\AboutController;
use App\Http\Controllers\AppContent\Phone\PhoneController;
use App\Http\Controllers\HotelTicket\HotelTicketController;
use App\Http\Controllers\AppContent\Policy\PolicyController;
use App\Http\Controllers\confirmTicket\ConfirmTicketController;
use App\Http\Controllers\Entertainment\EntertainmentController;
use App\Http\Controllers\Transportation\TransportationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/users/{id}', [QRCodeController::class , 'redirectToUserPage'])->name('redirect.user');
// Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
// Route::get('/show-email', [EmailController::class, 'showComposeForm'])->name('email.show');
Route::get('/result', function () {
    return view('id');
});
Route::get('/send-email', [EmailsController::class, 'showEmailPage'])->name('email.show');
Route::post('/send-email', [EmailsController::class, 'sendEmail'])-> name('send.email');
Route::get('/users/change/{eventIds}/{airlineIds}', [EmailsController::class, 'event_airline'])->name('event.airline');
Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/login', function () {
    return view('admin.Auth.login');
});

Route::group(['middleware' => 'guest:web'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.custom');
    Route::post('login', [AuthController::class, 'customLogin'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [AuthController::class, 'dashboard'])->name('home');
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('package', PackageController::class);

    Route::resource('phones', PhoneController::class);
    Route::resource('emails', EmailController::class);
    Route::resource('policy', PolicyController::class);
    Route::resource('about', AboutController::class);



    Route::get('admin/activation/{id}', [AdminController::class, 'activation'])->name('admin.activate');
    Route::get('users/activation/{id}', [UserController::class, 'activation'])->name('users.activate');
});

Route::get('/cancel_reservation/{id}', [UserController::class, 'destroy'])->name('delete');
// events routes


Route::get('/event/show', [EventController::class, 'index'])->name('show');
Route::get('/events/create', [EventController::class, 'create'])->name('create');
Route::post('/events/store', [EventController::class, 'store'])->name('store');
Route::get('/events/show/{id}', [EventController::class, 'show'])->name('btn.show');
Route::delete('/events/delete/{id}', [EventController::class, 'destroy'])->name('event_delete');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('btn.edit');
Route::put('/events/update/{id}', [EventController::class, 'update'])->name('update');
Route::resource('category', CategoryController::class);
Route::get('/events/change/{country_id}', [EventController::class, 'country_city'])->name('cities');
Route::resource('booking', HotelTicketController::class);
// Route::resource('confirm', ConfirmTicketController::class);
Route::resource('airports', AirPortController::class);
Route::get('confirm/ticket', [ConfirmTicketController::class, 'index'])->name('confirm.index');
Route::get('confirm/ticket/{id}', [ConfirmTicketController::class, 'show'])->name('confirm.show');
Route::get('edit/ticket/{id}', [ConfirmTicketController::class, 'show_edit_ticket'])->name('show.edit_ticket');
Route::get('index/edit/ticket', [ConfirmTicketController::class, 'index_edit_ticket'])->name('index.edit_ticket');
Route::get('accept/ticket/{original}', [ConfirmTicketController::class, 'accept'])->name('accept');
Route::get('ignore/ticket/{updated}', [ConfirmTicketController::class, 'ignore'])->name('ignore');

// Route::get('hotels/create/{id}', [HotelController::class, 'create'])->name('hotels.create');
// Route::resource('hotels', HotelController::class);
// Route::get('event/{event}/hotel', [HotelController::class, 'create'])->name('hotels.create');
Route::get('/hotel/event/{event}', [HotelController::class, 'create'])->name('hotels.create');
Route::post('/hotel/event/{event}', [HotelController::class, 'store'])->name('hotels.store');

// web.php or api.php
Route::get('/transportation/event/{event}', [TransportationController::class, 'create'])->name('transportations.create');
Route::post('/transportation/event/{event}', [TransportationController::class, 'store'])->name('transportations.store');

Route::get('/entertainment/event/{event}', [EntertainmentController::class, 'create'])->name('entertainments.create');
Route::post('/entertainment/event/{event}', [EntertainmentController::class, 'store'])->name('entertainments.store');

Route::get('show/ticket', [CheckInController::class, 'index'])->name('checks.index');
Route::get('show/ticket/{id}', [CheckInController::class, 'show'])->name('checks.show');

Route::resource('airlineCountry', AirlineCountryController::class);
Route::post('create_time', [AirPortController::class, 'createTime'])->name('create_time');
Route::delete('time/{id}', [AirPortController::class, 'deleteTime'])->name('deleteTime');



// Route::get('test',[QRCodeController::class,'generateQRCode']);

Route::get('users/toggle/{id}', [ToggleController::class, 'activation'])->name('toggle.status');


// Route::get('/ticket/index', [HotelTicketController::class, 'index'])->name('tickets.index');
// web.php
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/statistics', \App\Http\Controllers\StatisticsController::class)->name('statistics');
