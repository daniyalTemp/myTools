<?php

use Illuminate\Support\Facades\Route;

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



    Route::namespace('App\Http\Controllers\tools')->group(function () {
        Route::get('/', 'toolscontroller@index')->name('tools.index');
        Route::post('/encrypt', 'encryptioncontroller@encrypt')->name('tools.encrypt');
        Route::post('/decrypt', 'decryptioncontroller@decrypt')->name('tools.decrypt');


        Route::post('/decodeBase64', 'decodecontroller@decodeBase64')->name('tools.decodeBase64');
        Route::post('/encodeBase64', 'encodecontroller@encodeBase64')->name('tools.encodeBase64');




    });




