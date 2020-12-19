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

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@home');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/viewPizza/{id}', 'HomeController@viewPizza')->name('getpizza')->where('id', '[0-9]+');
Route::post('/addCart', 'CartController@addCart')->name("addCart")->middleware('can:isMember');
Route::post('/updateCart', 'CartController@updateCart')->name("updateCart")->middleware('can:isMember');
Route::get('/checkoutCart', 'CartController@checkoutCart')->name("checkoutCart")->middleware('can:isMember');

Route::group(['middleware' => ['can:isMember']], function () {
    Route::group(['prefix' => 'member'], function () {
        Route::get('home', 'UserController@home')->name('user_home');
        Route::get('transaction', 'UserController@transaction')->name('transaction');
        Route::group(['prefix' => 'transaction'], function () {
            Route::get('list/{id}', 'TransactionController@view')->name('viewTransaction')->where('id', '[0-9]+');
        });
        Route::get('cart', 'UserController@viewCart')->name('viewCart');
        Route::get('searchPizza', 'UserController@doSearch')->name('searchPizza');
    });
});


Route::group(['middleware' => ['can:isAdmin']], function () {
    Route::group(['prefix' => 'pizza'], function () {
        Route::get('add', 'PizzaController@addPizza')->name('add_pizza');
        Route::post('add', 'PizzaController@do_addPizza')->name('do_addPizza');

        Route::get('edit/{id}', 'PizzaController@editPizza')->name('edit_pizza')->where('id', '[0-9]+');
        Route::post('edit/{id}', 'PizzaController@do_editPizza')->name('do_editPizza')->where('id', '[0-9]+');

        Route::get('delete/{id}', 'PizzaController@deletePizza')->name('delete_pizza')->where('id', '[0-9]+');
        Route::post('delete/{id}', 'PizzaController@do_deletePizza')->name('do_deletePizza')->where('id', '[0-9]+');
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@home')->name('home_admin');
        Route::get('users', 'AdminController@userslist')->name('alluser');
        Route::get('transaction', 'AdminController@transactionlist')->name('transactionAdmin');
        Route::get('transaction/{id}', 'AdminController@transactionbyid')->name('viewTransactionAdmin')->where('id', '[0-9]+');
    });
});
