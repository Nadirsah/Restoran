<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Front\IndexController;


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

// Route::get('/redirects', [IndexController::class, 'redirects']);
Route::get('/index', [IndexController::class, 'index']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','permission']], function () {
  Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
  // User
  Route::resource('/user', Usercontroller::class,);
  Route::post('update_status/', [Usercontroller::class, 'updateStatus'])->name('isdiscount');
  // Setting
  Route::resource('/setting', SettingController::class,);
  Route::post('update_site/', [SettingController::class, 'updateSite'])->name('isStatussite');
  // Role
  Route::resource('/role', RoleController::class,);
  Route::post('/role_delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

  Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
  Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permission.revoke');

  Route::get('/users/{user}', [Usercontroller::class, 'showRole'])->name('users.role');
  Route::post('/users/{user}/roles', [Usercontroller::class, 'giveUserRole'])->name('users.roles');
  Route::delete('/users/{user}/roles/{role}', [Usercontroller::class, 'revokeUserRole'])->name('users.roles.remove');


  
  
});

Route::middleware(['web', 'guest'])->controller(AuthController::class)->group(function () {
  Route::get('/admin/login', 'index')->name('login');
  Route::post('/admin/login', 'auth')->name('auth');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
