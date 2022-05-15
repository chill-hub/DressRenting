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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//facebook socialite
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


//this is the route of admin, also group as admin.
//though middleware is in AdminController
Route::group(['as'=>'admin.', 'middleware'=>['auth','admin'],'prefix'=>'admin'], function (){
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('product', 'ProductController'); //default name is admin.product.placeholder;
    Route::resource('category', 'CategoryController'); //default name is admin.category.placeholder;
    Route::resource('product', 'ProductController');
});