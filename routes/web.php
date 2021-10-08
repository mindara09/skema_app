<?php

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

Route::get('/_adminlogin', 'LoginController@login')->name('login');
Route::post('/_adminlogin', 'LoginController@proses_login')->name('proses_login');
Route::get('/_adminlogout', 'LoginController@logout')->name('logout');

Route::get('/','HomeController@reservasi')->name('reservasi');
Route::get('/menu/{phone}','HomeController@menu')->name('menu');
Route::get('/verif','HomeController@verif')->name('verif');
Route::get('/success','HomeController@success')->name('success');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
	Route::get('/dashboard/orders','DashboardController@order')->name('order');
	Route::get('/dashboard/categories','DashboardController@categories')->name('categories');
	Route::get('/dashboard/products','DashboardController@products')->name('products');
	Route::get('/dashboard/customers','DashboardController@customers')->name('customers');
	Route::get('/dashboard/customers/delete/{id}','DashboardController@delete_customers')->name('delete_customers');
	Route::get('/dashboard/users','DashboardController@users')->name('users');
});
	
