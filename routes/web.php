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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::resources(['desk' => 'DeskController']);

Route::get('/read', 'ReaderController@read')->name('read');
Route::get('/read/index', 'ReaderController@index')->name('read.index');


