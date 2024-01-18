<?php

use App\Http\Controllers\Web\ItemController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ProviderController;
use App\Http\Controllers\Web\UserController;
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

Route::get('success', [ServiceController::class, 'success']);
Route::get('error', [ServiceController::class, 'error']);


Route::group(['middleware' => 'guest:web'], function () {
    Route::get('login', function () {return view('auth.login');})->name('login.page');
    Route::post('login', [AuthController::class, 'webLogin'])->name('login.store');
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::post('logout', [AuthController::class, 'webLogout']);

    Route::get('/', function () {return view('dashboard.index');});
    Route::get('/dashboard', function () {return view('dashboard.index');});

    # Menue
    Route::resource('items', ItemController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('eProviders', ProviderController::class);
    Route::resource('users', UserController::class);
});

Route::get('bookings', function () {
    dd('bookings');
})->name('bookings.index');
Route::get('/favorites', function () {
    dd('favorites');
})->name('favorites.index');
Route::get('/notifications', function () {
    dd('notifications');
})->name('notifications.index');
Route::get('modules', function () {
    dd('modules');
})->name('modules.index');

Route::get('eProviderTypes', function () {
    dd('eProviderTypes');
})->name('eProviderTypes.index');

Route::get('EProviderDocuments', function () {
    dd('EProviderDocuments');
})->name('documents.index');

Route::get('requestedEProviders', function () {
    dd('requestedEProviders');
})->name('requestedEProviders.index');

Route::get('earnings', function () {
    dd('earnings');
})->name('earnings.index');
Route::get('earnings', function () {
    dd('earnings');
})->name('earnings.index');

Route::get('user/profile', function () {
    dd('users');
})->name('users.profile');

Route::get('payments', function () {
    dd('payments');
})->name('payments.index');

Route::put('eProvider/edit', function () {
    dd('eProvider-edit');
})->name('eProviders.edit');

Route::post('galleries', function () {
    dd('galleries');
})->name('galleries.index');
Route::post('awards', function () {
    dd('awards');
})->name('awards.index');
