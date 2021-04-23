<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SourceController;
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

Route::get('/', [ArticleController::class, 'index'])->name('article.index');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::resource('/sources', SourceController::class);

Route::post('/sources/{source}/crawl', [SourceController::class, 'crawl'])->name('source.crawl');
