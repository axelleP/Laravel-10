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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ErrorController;

Route::get('/', [HomeController::class, 'index'])->name('home');

//////////Article
Route::get('/articles', [ArticleController::class, 'showList'])->name('article.list');
Route::get('/article/{id}', [ArticleController::class, 'showView'])->name('article.view');
Route::get('/article/form/{id?}', [ArticleController::class, 'showForm'])
->where('id', '[0-9]+')//le paramètre id doit correspondre à la regexp
->name('article.form');//? indique que le paramètre est facultatif
//utilisateur connecté
// Route::middleware(['isConnected'])->group(function () {
    Route::post('/article/form/{id?}', [ArticleController::class, 'save'])->where('id', '[0-9]+')->name('article.save');
    Route::delete('/article/{id}', [ArticleController::class, 'delete'])->where('id', '[0-9]+')->name('article.delete');
// });


///////////Page non trouvée
Route::fallback([ErrorController::class, 'showError404']);