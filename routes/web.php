<?php

use Illuminate\Routing\RouteGroup;
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
    return view('auth.login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function() {
    
Route::any('/offences', [App\Http\Controllers\OffencesController::class, 'index'])->name('offences');
Route::get('/offences/{temp}', [App\Http\Controllers\OffencesController::class, 'template'])->name('template_report');
Route::get('/capture', [App\Http\Controllers\OffencesController::class, 'form2'])->name('capture');
Route::get('/offence_entry', [App\Http\Controllers\OffencesController::class, 'create'])->name('offence_reporter');
Route::post('/offence', [App\Http\Controllers\OffencesController::class, 'store'])->name('offence');
Route::post('/attach_action', [App\Http\Controllers\OffencesController::class, 'action'])->name('attach_action');
Route::get('/case/{id}/{d?}', [App\Http\Controllers\OffencesController::class, 'show'])->name('case');
Route::get('/people/{q}', [App\Http\Controllers\PeopleController::class, 'list'])->name('people');
Route::get('/location/{id}', [App\Http\Controllers\VillagesController::class, 'village_details'])->name('location');
Route::get('/village/{h}', [App\Http\Controllers\VillagesController::class, 'village_search'])->name('village');
Route::get('/test/{n?}', [App\Http\Controllers\OffencesController::class, 'test'])->name('test');

Route::get('/villages', [App\Http\Controllers\VillagesController::class, 'index'])->name('villages');
Route::post('/village', [App\Http\Controllers\VillagesController::class, 'store'])->name('village');

Route::get('/parishes', [App\Http\Controllers\ParishesController::class, 'index'])->name('parishes');
Route::get('/parishes/{subcounty}/{id?}', [App\Http\Controllers\ParishesController::class, 'search']);
Route::post('/parish', [App\Http\Controllers\ParishesController::class, 'store'])->name('parish');

Route::get('/subcounties', [App\Http\Controllers\SubCountiesController::class, 'index'])->name('subcounties');
Route::get('/subcounties/{county}/{id?}', [App\Http\Controllers\SubCountiesController::class, 'search']);
Route::post('/subcounty', [App\Http\Controllers\SubCountiesController::class, 'store'])->name('subcounty');

Route::get('/counties', [App\Http\Controllers\CountiesController::class, 'index'])->name('counties');
Route::get('/counties/{districtId}/{id?}', [App\Http\Controllers\CountiesController::class, 'search']);
Route::post('/county', [App\Http\Controllers\CountiesController::class, 'store'])->name('county');

Route::get('/districts', [App\Http\Controllers\DistrictsController::class, 'index'])->name('districts');
Route::get('/districts/{hint?}', [App\Http\Controllers\DistrictsController::class, 'search']);
Route::post('/district', [App\Http\Controllers\DistrictsController::class, 'store'])->name('district');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/roles', [App\Http\Controllers\UsersController::class, 'roles'])->name('roles');
Route::get('/permissions', [App\Http\Controllers\UsersController::class, 'permissions'])->name('permissions');

Route::post('/user', [App\Http\Controllers\UsersController::class, 'store'])->name('user');
Route::post('/permission', [App\Http\Controllers\UsersController::class, 'createPermission'])->name('permission');
Route::post('/role', [App\Http\Controllers\UsersController::class, 'createRole'])->name('role');
Route::post('/userrole', [App\Http\Controllers\UsersController::class, 'roleToUser'])->name('userrole');
Route::post('/reset', [App\Http\Controllers\UsersController::class, 'resetUser'])->name('reset');
Route::post('/permstorole', [App\Http\Controllers\UsersController::class, 'permissionsToRole'])->name('permstorole');
Route::get('/activate', [App\Http\Controllers\UsersController::class, 'changePass'])->name('activate');
Route::post('/changepass', [App\Http\Controllers\UsersController::class, 'changePassword'])->name('changepass');

Route::get('/offencelist', [App\Http\Controllers\OffencesController::class, 'list'])->name('offencelist');
Route::get('/actions', [App\Http\Controllers\ActionsController::class, 'index'])->name('actions');
Route::get('/forwarders', [App\Http\Controllers\ForwardersController::class, 'index'])->name('forwarders');

Route::post('/action', [App\Http\Controllers\ActionsController::class, 'store'])->name('action');
Route::post('/saveOffence', [App\Http\Controllers\OffencesController::class, 'saveOffenceType'])->name('saveOffence');
Route::post('/forwarder', [App\Http\Controllers\ForwardersController::class, 'store'])->name('forwarder');
Route::any('/bulkforwarder', [App\Http\Controllers\ForwardersController::class, 'bulkforwarder'])->name('bulkforwarder');

Route::get('/forwarders/{q}', [App\Http\Controllers\ForwardersController::class, 'list'])->name('people');

});


