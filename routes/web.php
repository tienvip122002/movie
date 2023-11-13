<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[App\Http\Controllers\IndexController::class, 'home'])->name('homepages');
Route::get('/danh-muc/{slug}',[App\Http\Controllers\IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}',[App\Http\Controllers\IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[App\Http\Controllers\IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}',[App\Http\Controllers\IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}',[App\Http\Controllers\IndexController::class, 'watch'])->name('watch');
Route::get('/so-tap',[App\Http\Controllers\IndexController::class, 'episode'])->name('so-tap');
Route::get('/year/{year}',[App\Http\Controllers\IndexController::class, 'year']);
Route::get('/tag/{tag}',[App\Http\Controllers\IndexController::class, 'tag']);
Route::get('/tim-kiem',[App\Http\Controllers\IndexController::class, 'search'])->name('tim-kiem');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route admin
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::post('resorting', [App\Http\Controllers\CategoryController::class,'resorting'])->name('resorting');
Route::resource('genre', App\Http\Controllers\GenreController::class);
Route::resource('country', App\Http\Controllers\CountryController::class);
Route::resource('movie', App\Http\Controllers\MovieController::class);
Route::resource('episode', App\Http\Controllers\EpisodeController::class);
//select movie để chọn tập
Route::get('select-movie', [App\Http\Controllers\EpisodeController::class,'select_movie'])->name('select-movie');
Route::get('/update-year-phim',[App\Http\Controllers\MovieController::class, 'update_year']);
Route::get('/update-season-phim',[App\Http\Controllers\MovieController::class, 'update_season']);
Route::get('/update-thongke',[App\Http\Controllers\MovieController::class, 'update_tt']);
Route::post('/filter-topview',[App\Http\Controllers\MovieController::class, 'show_topview']);

Route::get('/filter-topview-df',[App\Http\Controllers\MovieController::class, 'show_topview_df']);

