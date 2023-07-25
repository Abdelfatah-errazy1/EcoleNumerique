<?php


use App\Http\Controllers\Helpers\LocaleController;
use App\Http\Controllers\Helpers\StorageController;
use Illuminate\Support\Facades\Route;

Route::get('language/{locale}', LocaleController::class)->name('setLang');


Route::get('file/{file?}', [StorageController::class, 'public'])
    ->where('file', '.*')
    ->name('file.get');


Route::get('private/{file?}', [StorageController::class, 'private'])
    ->where('file', '.*')
    ->name('file.private.get');


Route::get('/error', function () {
    abort(500);
});
