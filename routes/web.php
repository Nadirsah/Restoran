<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ChefsController;
use App\Http\Controllers\Admin\Chefs_SocialController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\Menuscontroller;
use App\Http\Controllers\Admin\Messagecontroller;
use App\Http\Controllers\Admin\Navbarcontroller;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TranslateController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Front\About_Controller;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\MenuController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\TeamController;
use App\Http\Controllers\Front\TestimonialController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'localize', 'localeViewPath']], function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/about', [About_Controller::class, 'index'])->name('about');
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::resource('/message', Messagecontroller::class);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // User
    Route::resource('/user', Usercontroller::class);
    Route::post('update_status/', [Usercontroller::class, 'updateStatus'])->name('isdiscount');
    // Setting
    Route::resource('/setting', SettingController::class);
    Route::post('update_site/', [SettingController::class, 'updateSite'])->name('isStatussite');
    // Role
    Route::resource('/role', RoleController::class);
    Route::post('/role_delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permission.revoke');

    Route::get('/users/{user}', [Usercontroller::class, 'showRole'])->name('users.role');
    Route::post('/users/{user}/roles', [Usercontroller::class, 'giveUserRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [Usercontroller::class, 'revokeUserRole'])->name('users.roles.remove');

    // Lang
    Route::resource('/lang', LangController::class);
    Route::post('/delete_lang/{id}', [LangController::class, 'delete'])->name('lang.delete');
    // Translate
    Route::resource('/translate', TranslateController::class);
    // Chefs
    Route::resource('/chefs', ChefsController::class);
    Route::post('/chef_delete/{id}', [ChefsController::class, 'delete'])->name('chef.delete');
    // Chefs social
    Route::resource('/chefs_social', Chefs_SocialController::class);
    Route::post('/chef_social_delete/{id}', [Chefs_SocialController::class, 'delete'])->name('chef_social.delete');
    // Service
    Route::resource('/services', ServicesController::class);
    Route::post('/services_delete/{id}', [ServicesController::class, 'delete'])->name('services.delete');
    // About
    Route::resource('/about', AboutController::class);
    Route::post('/about_delete/{id}', [AboutController::class, 'delete'])->name('about.delete');
    Route::post('/delete_image/{id}', [AboutController::class, 'deleteimg'])->name('image.delete');
    // Menu
    Route::resource('/menu', Menuscontroller::class);
    Route::post('/menu_delete/{id}', [Menuscontroller::class, 'delete'])->name('menu.delete');
    // Navbar
    Route::resource('/navbar', Navbarcontroller::class);
    Route::post('/navbar_delete/{id}', [Navbarcontroller::class, 'delete'])->name('navbar.delete');
});

Route::middleware(['web', 'guest'])->controller(AuthController::class)->group(function () {
    Route::get('/admin/login', 'index')->name('login');
    Route::post('/admin/login', 'auth')->name('auth');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
