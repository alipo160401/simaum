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

    Route::group(['prefix' => '/tanah'], function(){
        
        Route::get('index', 'TanahController@index');
        Route::get('create', 'TanahController@create');
        Route::post('store', 'TanahController@store');
        Route::get('edit/{id}', 'TanahController@edit');
        Route::post('update/{id}', 'TanahController@update');
        Route::post('destroy/{id}', 'TanahController@destroy');
        
    });

    Route::group(['prefix' => '/gedung'], function(){
        
        Route::get('index', 'GedungController@index');
        Route::get('create', 'GedungController@create');
        Route::post('store', 'GedungController@store');
        Route::get('edit/{id}', 'GedungController@edit');
        Route::post('update/{id}', 'GedungController@update');
        Route::post('destroy/{id}', 'GedungController@destroy');
        
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
        Route::get('{id}', 'PengadaanController@show');      
    });

    Route::group(['prefix' => '/detailPengadaan'], function(){

        Route::post('store', 'DetailPengadaanController@store');   
        Route::get('edit/{id}', 'DetailPengadaanController@edit');
        Route::post('update/{id}', 'DetailPengadaanController@update');
        Route::post('destroy/{id}', 'DetailPengadaanController@destroy');

    });

    Route::group(['prefix' => '/pemeliharaanRutin'], function(){
        
        Route::get('index', 'PemeliharaanRutinController@index');
        Route::get('create', 'PemeliharaanRutinController@create');
        Route::post('store', 'PemeliharaanRutinController@store');
        Route::get('edit/{id}', 'PemeliharaanRutinController@edit');
        Route::post('update/{id}', 'PemeliharaanRutinController@update');
        Route::post('destroy/{id}', 'PemeliharaanRutinController@destroy');
        Route::get('{id}', 'PemeliharaanRutinController@show');      
        
    });

    Route::group(['prefix' => '/detailPemeliharaan'], function(){

        Route::post('store', 'DetailPemeliharaanController@store');   
        Route::get('edit/{id}', 'DetailPemeliharaanController@edit');
        Route::post('update/{id}', 'DetailPemeliharaanController@update');
        Route::post('destroy/{id}', 'DetailPemeliharaanController@destroy');

    });

    Route::group(['prefix' => '/perbaikan'], function(){
        
        Route::get('index', 'PerbaikanController@index');
        Route::get('create', 'PerbaikanController@create');
        Route::post('store', 'PerbaikanController@store');
        Route::get('edit/{id}', 'PerbaikanController@edit');
        Route::post('update/{id}', 'PerbaikanController@update');
        Route::post('destroy/{id}', 'PerbaikanController@destroy');
        Route::get('{id}', 'PerbaikanController@show');      
    });

    Route::group(['prefix' => '/detailPerbaikan'], function(){

        Route::post('store', 'DetailPerbaikanController@store');   
        Route::get('edit/{id}', 'DetailPerbaikanController@edit');
        Route::post('update/{id}', 'DetailPerbaikanController@update');
        Route::post('destroy/{id}', 'DetailPerbaikanController@destroy');

    });


    Route::group(['prefix' => '/perbaikan'], function(){
        
        Route::get('index', 'PerbaikanController@index');
        Route::get('create', 'PerbaikanController@create');
        Route::post('store', 'PerbaikanController@store');
        Route::get('edit/{id}', 'PerbaikanController@edit');
        Route::post('update/{id}', 'PerbaikanController@update');
        Route::post('destroy/{id}', 'PerbaikanController@destroy');
        
    });

    Route::group(['prefix' => '/pemindahan'], function(){
        
        Route::get('index', 'PemindahanController@index');
        Route::get('create', 'PemindahanController@create');
        Route::post('store', 'PemindahanController@store');
        Route::get('edit/{id}', 'PemindahanController@edit');
        Route::post('update/{id}', 'PemindahanController@update');
        Route::post('destroy/{id}', 'PemindahanController@destroy');
        Route::get('editStatus/{id}', 'PemindahanController@editStatus');
        Route::post('updateStatus/{id}', 'PemindahanController@updateStatus');
        
    });

    Route::group(['prefix' => '/pemusnahan'], function(){
        
        Route::get('index', 'PemusnahanController@index');
        Route::get('create', 'PemusnahanController@create');
        Route::post('store', 'PemusnahanController@store');
        Route::get('edit/{id}', 'PemusnahanController@edit');
        Route::post('update/{id}', 'PemusnahanController@update');
        Route::post('destroy/{id}', 'PemusnahanController@destroy');
        Route::get('editStatus/{id}', 'PemusnahanController@editStatus');
        Route::post('updateStatus/{id}', 'PemusnahanController@updateStatus');
        
    });


});
