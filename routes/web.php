<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PreviousEventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationEventController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Route;

Route::name('frontend.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/events', [App\Http\Controllers\Frontend\EventController::class, 'index'])->name('event.index');
    Route::get('/events/{slug}', [App\Http\Controllers\Frontend\EventController::class, 'show'])->name('event.show');
    Route::get('/faq', [App\Http\Controllers\Frontend\FaqController::class, 'index'])->name('faq.index');
    Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
    Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
    Route::get('/registration', [App\Http\Controllers\Frontend\RegistrationController::class, 'index'])->name('registration');
    Route::get('/previous-events/{slug}', [App\Http\Controllers\Frontend\PreviousEventController::class, 'show'])->name('previous-events.show');


    Route::get('/verify-email/{token}', [App\Http\Controllers\AuthController::class, 'verifyEmail']);
    Route::get('/verify', [App\Http\Controllers\AuthController::class, 'verify'])->name('verify');
    Route::post('/verify', [App\Http\Controllers\AuthController::class, 'retoken'])->name('retoken');


    Route::prefix('user')->middleware(['auth', EnsureEmailIsVerified::class])->group(function () {
        Route::get('/profile', [App\Http\Controllers\Frontend\ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/profile', [App\Http\Controllers\Frontend\ProfileController::class, 'update'])->name('profile.update');
        Route::post('/registration', [App\Http\Controllers\Frontend\RegistrationController::class, 'submit'])->name('registration.submit');
        Route::get('/registration/success', [App\Http\Controllers\Frontend\RegistrationController::class, 'success'])->name('registration.success');
        Route::get('/registration/payment/{id}', [App\Http\Controllers\Frontend\RegistrationController::class, 'payment'])->name('registration.payment');
        Route::post('/registration/payment/{id}', [App\Http\Controllers\Frontend\RegistrationController::class, 'payment_submit'])->name('registration.payment.submit');
        Route::get('/notification/seen', [App\Http\Controllers\Frontend\NotificationController::class, 'seen'])->name('notifications.seen');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'login_process'])->name('login.process');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'register_process'])->name('register.process');
    Route::get('forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
});

Route::prefix('dashboard')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'a_login'])->name('a_login');
    Route::post('login', [AuthController::class, 'login_process'])->name('login.process');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::prefix('dashboard')->middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('users', UserController::class)->except('show');
    Route::resource('permissions', PermissionController::class)->except('show');
    Route::resource('roles', RoleController::class)->except('show');
    Route::resource('events', EventController::class);
    Route::resource('faqs', FaqController::class);
    Route::get('company-profile', [CompanyProfileController::class, 'index'])->name('company-profile.index');
    Route::post('company-profile', [CompanyProfileController::class, 'update'])->name('company-profile.update');
    Route::resource('payment-methods', PaymentMethodController::class);
    Route::resource('previous-events', PreviousEventController::class);
    Route::get('registration-events', [RegistrationEventController::class, 'index'])->name('registration-events.index');
    Route::get('registration-events/update-status', [RegistrationEventController::class, 'update_status'])->name('registration-events.update-status');
    Route::get('registration-events/{id}', [RegistrationEventController::class, 'show'])->name('registration-events.show');
    Route::get('registration-events/{id}/ticket', [RegistrationEventController::class, 'ticket'])->name('registration-events.ticket');
    Route::post('registration-events/{id}/ticket', [RegistrationEventController::class, 'upload_ticket'])->name('registration-events.ticket-upload');
    Route::resource('committees', CommitteeController::class);
});


Route::get('test', function () {
    return view('frontend.pages.test');
});
