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

// Route::get('/', 'App\Http\Controllers\WelcomeController@index');
Route::get('events/{id}', 'App\Http\Controllers\EventsController@show')->name('events.show');

Route::get(
    'events/category/{category}/{subcategory?}',
    'App\Http\Controllers\EventsController@category'
);

Route::get('events', 'App\Http\Controllers\EventsController@index');

// Route::resource('tasks', 'App\Http\Controllers\TaskController');