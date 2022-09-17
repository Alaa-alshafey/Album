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

use Modules\Album\Http\Controllers\AlbumController;

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){


    Route::resource('album', 'AlbumController');
    Route::get('/AlbumData', [AlbumController::class, 'album_data'])->name('data.album_data');
    Route::get('/delete_album', [AlbumController::class, 'delete_album'])->name('delete_album');
    Route::get('/move_to_another_album/{id}', [AlbumController::class, 'move_to_another_album'])->name('move_to_another_album');



});
