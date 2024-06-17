<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\WikipediaController;
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

//Route::get('/', 'WikipediaController@index')->name('wikipedia.index');
//Route::get('/search', 'WikipediaController@search')->name('wikipedia.search');


Route::get('/', [WikipediaController::class, 'index'])->name('wikipedia.index');
Route::get('/search', [WikipediaController::class, 'search'])->name('wikipedia.search');
Route::get('/search-history', [WikipediaController::class, 'searchHistory'])->name('wikipedia.searchHistory');
