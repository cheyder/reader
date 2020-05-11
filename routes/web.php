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

Route::get('/desk/{currentFolder}', 'DeskController@collection')->name('desk');
Route::get('/desk/contents', 'DeskController@contents')->name('desk.contents');

Route::get('/text', 'ReaderController@text')->name('text');
Route::get('/text/contents', 'ReaderController@contents')->name('text.contents');


