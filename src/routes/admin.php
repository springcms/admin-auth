<?php

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

Route::get('/admin', function () {
   echo "admin i come back myself";
});

// APP Routes Below
Route::group(['middleware' => 'web','prefix'=>'admin', 'namespace' => 'SpringCms\AdminAuth\App\Http\Controllers'], function () {
    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
    ]);
});






Route::middleware(['web'])->prefix('admin')->group(function () {
	Route::get('/home', 'SpringCms\AdminAuth\App\Http\HomeController@index')->name('admin.home');	
    Route::get('/register', 'SpringCms\AdminAuth\App\Http\Auth\RegisterController@showRegistrationForm')->name('registerAdmin');
    Route::get('/login', 'SpringCms\AdminAuth\App\Http\Auth\LoginController@showlogin')->name('admin.showlogin');
    Route::post('/login', 'SpringCms\AdminAuth\App\Http\Auth\LoginController@login')->name('admin.login');
    Route::get('/logout', 'SpringCms\AdminAuth\App\Http\Auth\LoginController@logout')->name('admin.logout');

    // Route::get('/users','SpringCms\AdminAuth\App\Http\Controllers\UsersManagementController@index')->name('admin.users');
    // Route::get('/create-users','SpringCms\AdminAuth\App\Http\Controllers\UsersManagementController@create')->name('admin.users');
    // Route::post('/create-users','SpringCms\AdminAuth\App\Http\Controllers\UsersManagementController@store')->name('store.user');

    // Route::get('/edit-users/{id}','SpringCms\AdminAuth\App\Http\Controllers\UsersManagementController@edit')->name('edit.users');
    // Route::post('/edit-users','SpringCms\AdminAuth\App\Http\Controllers\UsersManagementController@update')->name('update.user');;

    // Route::post('/delete-users','SpringCms\AdminAuth\App\Http\Controllers\UsersManagementController@destroy')->name('delete.user');

     
});









