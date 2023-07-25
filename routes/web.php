<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlocController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\BatimentController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\TypeSalleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DetailsChapitreController;
use App\Http\Controllers\FichierJNotificationController;
use App\Http\Controllers\CategorieNotificationController;

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
Route::redirect('/','admin/login');

Route::middleware('auth:admin','connectivity')->prefix('admin')->group( function () {
    // Routes that require connectivity check
    Route::get('',function (){
        return view('index');
});





Route::name('periodes.')->prefix('periodes')->controller(PeriodeController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});

Route::name('modules.')->prefix('modules')->controller(ModuleController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});

Route::name('matieres.')->prefix('matieres')->controller(MatiereController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});


Route::name('detailsChapitres.')->prefix('detailsChapitres')->controller(DetailsChapitreController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('chapitres.')->prefix('chapitres')->controller(ChapitreController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});


Route::name('Batiments.')->prefix('Batiments')->controller(BatimentController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('blocs.')->prefix('blocs')->controller(BlocController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('salles.')->prefix('salles')->controller(SallesController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('notifications.')->prefix('notifications')->controller(NotificationController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
Route::name('fichierJoinNotifications.')->prefix('fichierJoinNotifications')->controller(FichierJNotificationController::class)
->group(function () {
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('{id}/download', 'downloadFile')->name('download');
    Route::get('{id}/create', 'create')->name('create');
    Route::post('{id}/store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
    
    Route::get('/', 'index')->name('index');
});
Route::name('CategoriesNotifications.')->prefix('CategoriesNotifications')->controller(CategorieNotificationController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});
// Route::name('sections.')->prefix('sections')->controller(SectionController::class)
// ->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('{id}/delete', 'destroy')->name('delete');
//     Route::get('{id}/show', 'show')->name('show');
//     Route::get('create', 'create')->name('create');
//     Route::post('store', 'store')->name('store');
//     Route::post('{id}/update', 'update')->name('update');
//     Route::post('delete', 'destroyGroup')->name('destroyGroup');
// });
Route::name('TypesSalles.')->prefix('TypesSalles')->controller(TypeSalleController::class)
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{id}/delete', 'destroy')->name('delete');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::post('{id}/update', 'update')->name('update');
    Route::post('delete', 'destroyGroup')->name('destroyGroup');
});









});

