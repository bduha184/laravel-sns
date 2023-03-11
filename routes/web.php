<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
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

Auth::routes();
Route::get('/', [ArticleController::class,'index'])->name('articles.index');
Route::resource('/articles',ArticleController::class)->except(['index','show'])->middleware('auth');
Route::resource('/articles',ArticleController::class)->only(['show']);
Route::prefix('articles')->name('articles.')->group(function(){
    Route::put('/{article}/like',[ArticleController::class,'like'])->name('like')->middleware('auth');
    Route::delete('/{article}/unlike',[ArticleController::class,'unlike'])->name('unlike')->middleware('auth');
});

Route::get('/tags/{name}',[TagController::class,'show'])->name('tags.show');
