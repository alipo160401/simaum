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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', 'LoginController@index');
Route::post('login', 'LoginController@doLogin')->name('login');

Route::group(['middleware' => 'auth'], function(){

    Route::get('check-role', 'LoginController@checkRole')->name('check-role');
    Route::get('logout', 'LoginController@doLogout');

    Route::group(['prefix' => '/user'], function(){
        
        Route::get('index', 'UserController@index');
        Route::get('create', 'UserController@create');
        Route::post('store', 'UserController@store');
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('update/{id}', 'UserController@update');
        Route::post('destroy/{id}', 'UserController@destroy');
        Route::get('editPassword/{id}', 'UserController@editPassword');
        Route::post('changePassword/{id}', 'UserController@changePassword');
        
    });
    
        Route::group(['prefix' => '/vendor'], function(){
            
            Route::get('index', 'VendorController@index');
            Route::get('create', 'VendorController@create');
            Route::post('store', 'VendorController@store');
            Route::get('edit/{id}', 'VendorController@edit');
            Route::post('update/{id}', 'VendorController@update');
            Route::post('destroy/{id}', 'VendorController@destroy');
            
        });

    Route::group(['prefix' => '/ruang'], function(){
        
        Route::get('index', 'RuangController@index');
        Route::get('create', 'RuangController@create');
        Route::post('store', 'RuangController@store');
        Route::get('edit/{id}', 'RuangController@edit');
        Route::post('update/{id}', 'RuangController@update');
        Route::post('destroy/{id}', 'RuangController@destroy');
        
    });

    Route::group(['prefix' => '/asset'], function(){
        
        Route::get('index', 'AssetController@index');
        Route::get('create', 'AssetController@create');
        Route::post('store', 'AssetController@store');
        Route::get('edit/{id}', 'AssetController@edit');
        Route::post('update/{id}', 'AssetController@update');
        Route::post('destroy/{id}', 'AssetController@destroy');
        
    });

    Route::group(['prefix' => '/shopingList'], function(){
        
        Route::get('index', 'ShopingListController@index');
        Route::get('create', 'ShopingListController@create');
        Route::post('store', 'ShopingListController@store');
        Route::get('edit/{id}', 'ShopingListController@edit');
        Route::post('update/{id}', 'ShopingListController@update');
        Route::post('destroy/{id}', 'ShopingListController@destroy');
        
    });

    Route::group(['prefix' => '/pengadaan'], function(){
        
        Route::get('index', 'PengadaanController@index');
        Route::get('create', 'PengadaanController@create');
        Route::post('store', 'PengadaanController@store');
        Route::get('edit/{id}', 'PengadaanController@edit');
        Route::post('update/{id}', 'PengadaanController@update');
        Route::post('destroy/{id}', 'PengadaanController@destroy');
        
    });

    Route::group(['prefix' => '/pemeliharaanRutin'], function(){
        
        Route::get('index', 'PemeliharaanRutinController@index');
        Route::get('create', 'PemeliharaanRutinController@create');
        Route::post('store', 'PemeliharaanRutinController@store');
        Route::get('edit/{id}', 'PemeliharaanRutinController@edit');
        Route::post('update/{id}', 'PemeliharaanRutinController@update');
        Route::post('destroy/{id}', 'PemeliharaanRutinController@destroy');
        
    });

    Route::group(['prefix' => '/perbaikan'], function(){
        
        Route::get('index', 'PerbaikanController@index');
        Route::get('create', 'PerbaikanController@create');
        Route::post('store', 'PerbaikanController@store');
        Route::get('edit/{id}', 'PerbaikanController@edit');
        Route::post('update/{id}', 'PerbaikanController@update');
        Route::post('destroy/{id}', 'PerbaikanController@destroy');
        
    });


});
