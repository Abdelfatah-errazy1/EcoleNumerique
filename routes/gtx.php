<?php

use App\Http\Controllers\Admin\CentreFormationAbonnementsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'affectation'], function () {
    Route::get('', [CentreFormationAbonnementsController::class, 'index'])
        ->name('abonnements.affectation');
    Route::post('filter/Center', [CentreFormationAbonnementsController::class, 'filterCenter'])
        ->name('abonnements.affectation.filterCenter');
    Route::post('filter/cabinets-abonnements', [CentreFormationAbonnementsController::class, 'filterCabinetsAbonnementst'])
        ->name('abonnements.affectation.filterCabinetsAbonnements');
    Route::post('find', [CentreFormationAbonnementsController::class, 'find'])
        ->name('abonnements.affectation.find');
    Route::post('update', [CentreFormationAbonnementsController::class, 'update'])
        ->name('abonnements.affectation.update');
    Route::post('add', [CentreFormationAbonnementsController::class, 'adds'])
        ->name('abonnements.affectation.add');
});

