<?php


use App\DataTables\UsersDataTable;
use App\Http\Controllers\Admin\AbonnementController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CentreFormationAbonnementsController;
use App\Http\Controllers\Admin\CentresFormationsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirecteurEtbController;
use App\Http\Controllers\Admin\EtablissementController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SecteurController;
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
Route::get('test' , function (){
    \App\Models\Admin::factory()->create();
});
Route::get('users', function (UsersDataTable $dataTable) {

    $columns = [
        [
            'data' => 'id',
            'title' => 'identifiant'
        ],
        [
            'data' => 'email',
            'title' => 'votre email'
        ],
        [
            'data' => null,
            'className' => "dt-center editor-delete",
            'orderable' => false,
            'mRender' => 'function(data, type, row){
                console.log(data);
                console.log(type);
                console.log(row);
            }'
        ]
    ];
    $columns = json_encode($columns);
    return view('users.index', compact('columns'));
});
Route::post('users/list', function () {

    return response()->json([
        "draw" => 1,
        "recordsTotal" => 57,
        "recordsFiltered" => 57,
        'data' => \App\Models\Admin::all()->toArray()
    ]);
})->name('users.list');
Route::name('admin.')->prefix('admin')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::controller(LoginController::class)->name('login.')->prefix('login')->group(function () {
            Route::get('', 'index')->name('view');
            Route::post('check', 'check')->name('check');
        });
        Route::controller(ForgotPasswordController::class)->name('forgotPassword.')->prefix('forgot-password')->group(function () {
            Route::get('', 'index')->name('view');
            Route::post('check', 'check')->name('check');
        });
        Route::controller(\App\Http\Controllers\Admin\Auth\ResetPasswordController::class)->name('resetPassword.')->prefix('reset-password')->group(function () {
            Route::get('{token}', 'checkToken')->name('check.token');
            Route::post('check', 'changePassword')->name('change');
        });
    });
    Route::controller(LoginController::class)
        ->middleware('auth:admin')
        ->group(function () {
            Route::get('dashboard', DashboardController::class)->name('dashboard');

            Route::prefix('profile')->name('profile')->controller(ProfileController::class)->group(function () {
                Route::get('', 'index');
                Route::post('saveDetails', 'saveDetails')->name('.saveDetails');
            });

            Route::name('admins.')->prefix('admins')->controller(AdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('{id}/delete', 'destroy')->name('delete');
                    Route::get('{id}/show', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::post('{id}/update', 'update')->name('update');
                    Route::get('{id}/update/status', 'updateStatus')->name('update_status');
                    Route::post('delete', 'destroyGroup')->name('destroyGroup');
                });

            Route::name('secteurs.')->prefix('secteurs')->controller(SecteurController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('{id}/delete', 'destroy')->name('delete');
                    Route::get('{id}/show', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::post('{id}/update', 'update')->name('update');
                    Route::post('delete', 'destroyGroup')->name('destroyGroup');
                });

            Route::name('options.')->prefix('options')->controller(OptionController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('{id}/delete', 'destroy')->name('delete');
                    Route::get('{id}/show', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::post('{id}/update', 'update')->name('update');
                    Route::post('delete', 'destroyGroup')->name('destroyGroup');

                    Route::get('affectation', 'affectation')->name('affectation');
                    Route::post('affectation/save', 'affectOptions')->name('affectOptions');
                    Route::post('filter-by-centre', 'filterdByCentreId')->name('filterdByCentreId');
                });

            Route::name('abonnements.')->prefix('abonnements')->controller(AbonnementController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('{id}/delete', 'destroy')->name('delete');
                    Route::get('{id}/show', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::post('{id}/update', 'update')->name('update');
                    Route::post('delete', 'destroyGroup')->name('destroyGroup');
                });

            Route::name('directeur.')->prefix('directeur')->controller(DirecteurEtbController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('{id}/delete', 'destroy')->name('delete');
                    Route::get('{id}/show', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::post('{id}/update', 'update')->name('update');
                    Route::post('delete', 'destroyGroup')->name('destroyGroup');
                });

            Route::name('etablissements.')->prefix('etablissements')->controller(EtablissementController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('{id}/delete', 'destroy')->name('delete');
                    Route::get('{id}/show', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::post('{id}/update', 'update')->name('update');
                    Route::post('delete', 'destroyGroup')->name('destroyGroup');
                });

            Route::name('centresFormations.')->prefix('centresFormations')->controller(CentresFormationsController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('{id}/delete', 'destroy')->name('delete');
                    Route::get('{id}/show', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::post('{id}/update', 'update')->name('update');
                    Route::post('delete', 'destroyGroup')->name('destroyGroup');
                });


            Route::get('logout', function () {
                Auth::guard('admin')->logout();
                return redirect(\route('admin.login.view'));
            })->name('logout');


            include 'gtx.php';

        });


});








