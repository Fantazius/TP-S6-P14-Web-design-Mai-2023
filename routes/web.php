<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Models\Article;
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

Route::get('/login', function () {
    return view('backoffice.login');
});
Route::get('/', function () {
    return redirect()->route('articles.index');
});
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/user/deconnect',[UserController::class, 'deconnect'])->name('deconnect');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/articles/update',[ArticleController::class,'update'])->name('articles.update');
    Route::post('/articles/destroy',[ArticleController::class,'destroy'])->name('articles.destroy');
    Route::resource('articles', ArticleController::class)->except(['update','destroy','index','show']);
    Route::get('/user/articles', [ArticleController::class, 'listMine'])->name('user.articles');
});

/* Route::get('/articles/{idarticle}/{slug}.js',function($idarticle,$slug){
    return redirect()->route('articles.show',["article"=>$idarticle]);
})->name('articles.seo')->where(['slug'=>'[a-z0-9]+(?:-[a-z0-9]+)*']);
 */
Route::get('/articles/{article}/{slug}.js',[ArticleController::class,'fiche'])->name('articles.seo')->where(['slug'=>'[a-z0-9]+(?:-[a-z0-9]+)*']);

Route::resource('articles',ArticleController::class)->only('index','show');
