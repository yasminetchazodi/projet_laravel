<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RatingController;

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\UniversityController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\CriteriaController;
use App\Http\Controllers\admin\RankingController;





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
require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/users', [UserController::class,'index'])->name('index');
Route::delete('users/{id}', [UserController::class,'destroy'])->name('destroy');

Route::get('/universities', [UniversityController::class,'indexun'])->name('indexun');
Route::delete('/universities/{id}', [UniversityController::class,'destroyun'])->name('destroyun');
Route::get('/universities/create', [UniversityController::class,'createun'])->name('createun'); // Ajout de la route pour la création
Route::post('/universities', [UniversityController::class, 'storeun'])->name('storeun');
Route::get('/universities/{id}/edit', [UniversityController::class, 'editun'])->name('editun');
Route::get('/universities/{id}', [FrontendController::class, 'showun'])->name('showun');
Route::put('/universities/{id}', [UniversityController::class, 'updateun'])->name('updateun');
Route::get('/liste', [FrontendController::class,'liste'])->name('liste');



Route::get('/comments/create/{universityId}', [FrontendController::class, 'createco'])->name('create_comment');
Route::get('/comments', [CommentController::class,'indexco'])->name('indexco');
Route::get('comments/{commentId}/edit', [CommentController::class,'editco'])->name('editco');
Route::delete('/comments/{commentId}', [CommentController::class,'destroyco'])->name('destroyco');
Route::put('/comments/{commentId}', [CommentController::class, 'updateco'])->name('updateco');
Route::post('/comments/store/{universityId}', [FrontendController::class, 'storeco'])->name('storeco');


Route::get('/criterias', [CriteriaController::class,'indexcr'])->name('indexcr');
Route::get('/criterias/create', [CriteriaController::class,'createcr'])->name('createcr'); // Ajout de la route pour la création
Route::get('/criteria/{id}/edit', [CriteriaController::class,'editcr'])->name('editcr');
Route::delete('/criterias/{id}', [CriteriaController::class,'destroycr'])->name('destroycr');
Route::put('/criterias/{id}', [CriteriaController::class, 'updatecr'])->name('updatecr');
Route::post('/criterias', [CriteriaController::class, 'storecr'])->name('storecr');


Route::get('/historique', [RatingController::class,'history'])->name('history');




Route::get('/ratings', [RatingController::class,'indexra'])->name('indexra');
Route::get('/rating/create/{universityId}', [RatingController::class, 'createra'])->name('rateun');
Route::post('/rating/store/{universityId}', [RatingController::class, 'rating'])->name('rating');
Route::get('/ratings/{rating}/edit', [RatingController::class, 'editra'])->name('editra');
Route::delete('/ratings/{rating}', [RatingController::class, 'destrora'])->name('destroyra');




Route::get('/ranking', [FrontendController::class,'ranking'])->name('ranking');


Route::get('/admin/ranking', [RankingController::class,'rankingclass'])->name('rankingclass');


Route::get('/home', [FrontendController::class, 'home'])->name('home');