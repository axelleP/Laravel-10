<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PHPMailerController;
use App\Http\Controllers\ErrorController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/subscribeNewsletter', [PHPMailerController::class, 'subscribeNewsletter'])->name('subscribeNewsletter');

//////////Article
Route::get('/articles', [ArticleController::class, 'showList'])->name('article.list');
Route::get('/article/{id}', [ArticleController::class, 'showView'])
->where('id', '[0-9]+')//le paramètre id doit correspondre à la regexp
->name('article.view');

//////////Changer la langue
Route::get('/change-locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale.change');

//////////Utilisateur connecté
Route::middleware(['auth'])->group(function () {
    Route::get('/article/form/{id?}', [ArticleController::class, 'showForm'])//? indique que le paramètre est facultatif
    ->where('id', '[0-9]+')->name('article.form');
    Route::post('/article/form/{id?}', [ArticleController::class, 'save'])->where('id', '[0-9]+')->name('article.save');
    Route::get('/article/delete/{id}', [ArticleController::class, 'delete'])->where('id', '[0-9]+')->name('article.delete');
});

///////////Page non trouvée
Route::fallback([ErrorController::class, 'showError404']);