<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Organizer;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;
use Whoops\Run;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin', function () {
//     return view('admin.layout');
// })->middleware(['auth'])->name('dashboard');

Route::prefix('category')->middleware(['auth','verified'])->controller(CategoryController::class)->group(function()
{
    Route::get('/','index')->name('category.index');
    Route::get('/create', 'create' )->name('category.create');
    Route::post('/', 'store')->name('category.store');
    Route::get('/{id}', 'edit')->name('category.edit');
    Route::put('/{id}', 'update')->name('category.update');
    Route::delete('/{id}', 'destroy')->name('category.delete');
});

Route::prefix('venue')->middleware(['auth','verified'])->controller(VenueController::class)->group(function()
{
    Route::get('/','index')->name('venue.index');
    Route::get('/create', 'create' )->name('venue.create');
    Route::post('/', 'store')->name('venue.store');
    Route::get('/{id}', 'edit')->name('venue.edit');
    Route::put('/{id}', 'update')->name('venue.update');
    Route::delete('/{id}', 'destroy')->name('venue.delete');
});

Route::prefix('event')->middleware(['auth','verified'])->controller(EventController::class)->group(function()
{
    Route::get('/','index')->name('event.index');
    Route::get('/create', 'create' )->name('event.create');
    Route::post('/', 'store')->name('event.store');
    Route::get('/{id}', 'edit')->name('event.edit');
    Route::put('/{id}', 'update')->name('event.update');
    Route::delete('/{id}', 'destroy')->name('event.delete');
    
});

Route::prefix('user')->middleware(['auth','verified','admin'])->controller(UserController::class)->group(function()
{
    Route::get('/','index')->name('user.index');
    Route::get('/{id}', 'edit')->name('user.edit');
    Route::put('/{id}', 'update')->name('user.update');
    Route::delete('/{id}', 'destroy')->name('user.delete');
});

Route::get('/dashboard', function () {
    return redirect(route("event.index"));
})->middleware(Organizer::class)->name('dashboard');

Route::prefix('ticket')->middleware(['auth'])->controller(TicketController::class)->group(function()
{
    Route::get('/','index')->name('ticket.index');
    Route::get('/create', 'create' )->name('ticket.create');
    Route::post('/{id}', 'store')->name('ticket.store');
    Route::get('/{id}', 'edit')->name('ticket.edit');
    Route::put('/{id}', 'update')->name('ticket.update');
    Route::delete('/{id}', 'destroy')->name('ticket.delete');
});


Route::prefix('/')->controller(EventController::class)->group(function()
{
    Route::get('/','event_index')->name('event_list');
    Route::get('event-detail/{id}','event_detail')->name('event.detail');
    Route::get('/all-event','all_event_index')->name('all_event_list');
});

Route::prefix('/')->controller(TicketController::class)->group(function(){
    Route::get('ticket-form/{id}','show_form')->name('ticket-form');
});

// Route::get('send-mail', [MailController::class, 'index'] );
Route::controller(SocialiteController::class)->group(function(){
    Route::get('auth/redirection/{provider}','authProviderRediect')->name('auth.redirection');
    Route::get('auth/{provider}/callback','socialAuthentication')->name('auth.callback');

});

Route::prefix('organizer')->middleware(['auth'])->controller(OrganizerController::class)->group(function () {
    Route::get('/','index')->name('organizer.index');
    Route::get('/create', 'create' )->name('organizer.create');
    Route::post('/', 'store')->name('organizer.store');
    Route::get('/{id}', 'edit')->name('organizer.edit');
    Route::put('/{id}', 'update')->name('organizer.update');
    Route::delete('/{id}', 'destroy')->name('organizer.delete');
    Route::get('/front','front')->name('organizer.front');
});

require __DIR__.'/auth.php';
