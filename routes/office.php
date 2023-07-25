<?php


use App\Http\Controllers\Admin\CentreFormationAbonnementsController;
use App\Http\Controllers\Office\Auth\ForgotPasswordController;
use App\Http\Controllers\Office\Auth\LoginController;
use App\Http\Controllers\Office\Auth\ResetPasswordController;
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

Route::get('emails', function () {
    return view('emails.admin.reset-password');
});

Route::name('office.')->prefix('office')->group(function () {

    Route::middleware('guest:office')->group(function () {
        Route::controller(LoginController::class)->name('login.')->prefix('login')->group(function () {
            Route::get('', 'index')->name('view');
            Route::post('check', 'check')->name('check');
        });
        Route::controller(ForgotPasswordController::class)->name('forgotPassword.')->prefix('forgot-password')->group(function () {
            Route::get('', 'index')->name('view');
            Route::post('check', 'check')->name('check');
        });
        Route::controller(ResetPasswordController::class)->name('resetPassword.')->prefix('reset-password')->group(function () {
            Route::get('{token}', 'checkToken')->name('check.token');
            Route::post('check', 'changePassword')->name('change');
        });
    });

    Route::controller(LoginController::class)->middleware('auth:office')->group(function () {
        Route::get('dashboard', function () {
            dd(Auth::guard('office')->user());
        })->name('dashboard');
        Route::get('logout', function () {

            Auth::guard('office')->logout();
            return redirect(\route('admin.login.view'));
        })->name('logout');

    });


});










