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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Task'], function() {
    Route::get('/tasks/create', 'CreateController')->name('task.create');
    Route::post('/', 'StoreController')->name('task.store');

    Route::get('/tasks/{task}/edit', 'EditController')->name('task.edit');
    Route::patch('/tasks/{task}', 'UpdateController')->name('task.update');
    Route::delete('/tasks/{task}', 'DeleteController')->name('task.delete');
});
