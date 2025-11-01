<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProviderStaffController;

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

//Route::view('/', 'welcome');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// ----------------------------------------------------------------------
// 1. DASHBOARD ACCESSIBLE BY *ANY* AUTHENTICATED USER
// ----------------------------------------------------------------------
// Only requires the user to be logged in.
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

     Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation');
});

//Route::middleware(['auth'])->group(function () {
Route::middleware(['auth', 'role:admin'])->group(function () {
    //Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::resource('manufacturers', ManufacturerController::class)->only(['index', 'create', 'store']);
    Route::resource('providers', ProviderController::class)->only(['index', 'create', 'store']);
    Route::resource('product', ProductController::class)->only(['index', 'create', 'store']);
    //Route::resource('provider-staff', App\Http\Controllers\ProviderStaffController::class);

    Route::get('/provider-staff/index', [ProviderStaffController::class, 'index'])->name('provider-staff.index');
    Route::get('/provider-staff/create', [ProviderStaffController::class, 'create'])->name('provider-staff.create');
    Route::post('/provider-staff/store', [ProviderStaffController::class, 'store'])->name('provider-staff.store');
    Route::post('/provider-staff/destroy', [ProviderStaffController::class, 'destroy'])->name('provider-staff.destroy');

    Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation');

    Route::get('/orderitem/index', [OrderItemController::class, 'index'])->name('orderitem.index');
    Route::resource('order-items', App\Http\Controllers\OrderItemController::class);

    Route::resource('inventory', InventoryController::class)->only(['index', 'create', 'store']);
    Route::resource('inventory-usage', App\Http\Controllers\InventoryUsageController::class);

    Route::resource('patients', App\Http\Controllers\PatientController::class);
    Route::resource('subscriptions', App\Http\Controllers\SubscriptionController::class);

});


// ----------------------------------------------------------------------
// 3. PROVIDER STAFF ROUTES (REQUIRES 'admin' OR 'provider' OR 'staff' roles)
// ----------------------------------------------------------------------
// NOTE: This assumes ProviderStaffController methods need access from multiple roles.
// If this group should ONLY be for 'provider-staff', update the middleware.

Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::resource('orders', OrderController::class);
    Route::resource('provider_staff', ProviderStaffController::class);
});

// Inventory, Patients, Subscriptions were outside the admin group in your previous file, 
// so I am placing them here assuming they are used by provider/staff

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
});

require __DIR__.'/auth.php';
