<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});


Route::get('/error', function () {
    abort(500);
});


require __DIR__ . '/auth.php';


//-----------------------------------------------------------------------------//



Route::group(['prefix' => 'users'], function () {

    Route::get('/', [userController::class, 'index'])
        ->name('users');

    Route::get('delete/{id}', [UserController::class, 'delete'])
        ->name('user.delete');

    Route::post('delete-selected', [userController::class, 'deleteMulti'])
        ->name('users.delete');

    Route::get('get/{id}', [userController::class, 'show'])
        ->name('user.show');

    Route::put('update/{id}', [userController::class, 'update'])
        ->name('user.update');

    Route::get('create', [userController::class, 'create'])
        ->name('user.create');

    Route::post('store', [userController::class, 'store'])
        ->name('user.store');
});

Route::group(['prefix' => 'options'], function () {

    Route::get('/', [OptionController::class, 'index'])
        ->name('options');

    Route::get('delete/{id}', [OptionController::class, 'delete'])
        ->name('option.delete');

    Route::post('delete-selected', [OptionController::class, 'deleteMulti'])
        ->name('options.delete');

    Route::get('get/{id}', [OptionController::class, 'show'])
        ->name('option.show');

    Route::put('update/{id}', [OptionController::class, 'update'])
        ->name('option.update');

    Route::get('create', [OptionController::class, 'create'])
        ->name('option.create');

    Route::post('store', [OptionController::class, 'store'])
        ->name('option.store');
});
