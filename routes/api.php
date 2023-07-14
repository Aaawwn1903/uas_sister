<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'buku'], function () {
    Route::get('/', 'BukuController@index')->middleware('can:viewAny,App\Models\Buku');
    Route::put('/{id}', 'BukuController@update')->middleware('can:update,buku');
});
