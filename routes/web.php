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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'operators'], function() {
            Route::get('/', 'OperatorController@index')->name('operators.index');
            Route::get('/create', 'OperatorController@create')->name('operators.create');
            Route::post('/create', 'OperatorController@store')->name('operators.store');
            Route::get('/{operator}/edit', 'OperatorController@edit')->name('operators.edit');
            Route::patch('/{operator}/update', 'OperatorController@update')->name('operators.update');
            Route::delete('/{operator}/delete', 'OperatorController@destroy')->name('operators.destroy');
        });

        /**
         * User Routes
         */
        Route::group(['prefix' => 'stands'], function() {
            Route::get('/', 'StandController@index')->name('stands.index');
            Route::get('/list', 'StandController@list')->name('stands.list');
            Route::get('/create', 'StandController@create')->name('stands.create');
            Route::post('/create', 'StandController@store')->name('stands.store');
            Route::get('/{stand}/show', 'StandController@show')->name('stands.show');
            Route::get('/{stand}/edit', 'StandController@edit')->name('stands.edit');
            Route::patch('/{stand}/update', 'StandController@update')->name('stands.update');
            Route::delete('/{stand}/delete', 'StandController@destroy')->name('stands.destroy');
        });

        Route::group(['prefix' => 'profile'], function() {
            Route::get('/settings', 'UserController@edit')->name('profile.edit');
            Route::patch('/settings/update', 'UserController@update')->name('profile.update');
        });
    });
});
