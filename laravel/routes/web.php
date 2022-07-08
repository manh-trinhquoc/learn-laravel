<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::redirect('/redirect', '/');

Route::get('/', [Controllers\WelcomeController::class, 'index'])->name('home');

Route::view('about', 'about.index', [
    'title_1' => 'About HackerPair',
    'title_2' => 'All about the drones, bots, and AIs behind this site',
])->name('about.index');
Route::view('about/book', 'about.book', [
    'title_1' => 'Easy Laravel 5',
    'title_2' => 'The latest edition is available in beta format!',
])->name('about.book');

Route::get('contact', [Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [Controllers\ContactController::class, 'store'])->name('contact.store');

Route::resource('events', 'App\Http\Controllers\EventsController');

Route::get('locations', [Controllers\LocationsController::class, 'index'])->name('locations.index');

Route::get('categories', [Controllers\CategoriesController::class, 'index'])->name('categories.index');

Route::get(
    'events/category/{category}/{subcategory?}',
    'App\Http\Controllers\EventsController@category'
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Route::resource('category', 'CategoriesController');
    // Route::resource('list', 'ListsController');
    // Route::resource('product', 'ProductsController');
    Route::resource('user', '\App\Http\Controllers\Admin\UsersController');
});

// Route::group(
//     [
//      'prefix' => 'admin',
//      'namespace' => 'admin',
//      'middleware' => 'admin'
//      ],
//     function () {
//         Route::resource('users', 'UsersController');
//     }
// );
