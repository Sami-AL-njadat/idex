<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




/*******************IDEX*************** */


Route::get('/dashboard', [Controller::class, 'dashboard']);
Route::get('/blogs/add', [Controller::class, 'addBlog'])->name('pageBlog.add');
Route::get('/blogs/edit/{id?}', [Controller::class, 'editBlog'])->name('pageBlog.edit');
Route::get('/blogs/all', [Controller::class, 'allBlog'])->name('page.blog');

// /************ARTICLE ROUTE VIEW************** */

Route::get('/article/add', [Controller::class, 'addArticle'])->name('page.add');
Route::get('/article/edit/{id?}', [Controller::class, 'editArticle'])->name('page.edit');
Route::get('/article/all', [Controller::class, 'allArticle'])->name('page.article');
// /******************************* */

Route::resource('/blog', BlogController::class);
Route::resource('/article', ArticleController::class);





/* ***********NEW Dash***************** */
Route::get('/www', [Controller::class, 'dash']);