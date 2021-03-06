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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']],function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    
    Route::get('/role-register','Admin\Dashboardcontroller@registered');
    
    Route::get('/role-edit/{id}','Admin\Dashboardcontroller@registeredit');
    Route::put('/role-register-update/{id}','Admin\Dashboardcontroller@registerupdate');
    Route::delete('/role-delete/{id}','Admin\Dashboardcontroller@registerdelete');
    
    Route::get('/abouts','Admin\AboutusController@index');
    Route::post('/save-aboutus','Admin\AboutusController@store');
    Route::get('/about-us/{id}','Admin\AboutusController@edit');
    Route::put('/aboutus-update/{id}','Admin\AboutusController@update');
    Route::delete('about-us-delete/{id}','Admin\AboutusController@delete');

});

