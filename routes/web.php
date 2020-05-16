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
  
  if (auth()->user() !== NULL) {
    $userId = auth()->user()->id;
    $userDeskFolder = \App\Folder::where('user_id', $userId)->first();
    $userDeskFolderId = $userDeskFolder->id;
    return view('welcome', ['userDeskFolderId' => $userDeskFolderId]);
  }
  return view('welcome');
    
})->name('welcome');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/desk/{currentFolder}', 'DeskController@collection')->name('desk');
Route::get('/desk/contents', 'DeskController@contents')->name('desk.contents');
Route::post('/desk/{currentFolderId}', 'DeskController@store')->name('desk.store');
Route::delete('/desk/delete/{elementType}/{elementId}', 'DeskController@delete')->name('desk.delete');

Route::get('/text/', 'ReaderController@text')->name('text');
Route::get('/text/contents', 'ReaderController@contents')->name('text.contents');


