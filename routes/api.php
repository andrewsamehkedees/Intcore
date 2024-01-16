<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\Author\AuthController;
use App\Http\Controllers\Auth\Author\AuthorAuthController;
use App\Http\Controllers\Auth\User\AuthController as UAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//User routes
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/authors', [UserController::class, 'showAuthors']);
    Route::get('/authors/{id}/articles', [UserController::class, 'showArticlesForAuthor']);

    //comments
    Route::post('/articles/{id}/comments', [CommentController::class, 'store']);
    Route::delete('/comments/{id}', [CommentController::class, 'delete']);

    //favorites
    Route::post('/articles/{id}/favorite', [FavoriteController::class, 'store']);
    Route::get('/articles/favorites', [FavoriteController::class, 'index']);

});

// Route::get('/verify-email', [UserController::class,'verifyEmail']);


// Article routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/article', [ArticleController::class, 'store']);
    Route::put('/article/{id}', [ArticleController::class, 'update']);
    Route::patch('/article/{id}/isactivate', [ArticleController::class, 'activateSwitch']);
    Route::delete('/article/{id}', [ArticleController::class, 'destroy']);
    Route::get('/article/{id}', [ArticleController::class, 'show']);
    
    //features
    Route::patch('/article/{id}/feature', [FeatureController::class, 'store']);
    Route::get('/articles/featured', [FeatureController::class, 'index']);

});

// Author routes
Route::post('/author/register', [AuthorAuthController::class, 'register']);
Route::post('/author/login', [AuthorAuthController::class, 'login']);
Route::post('/suspend/{id}', [AuthorController::class, 'suspendUser']);


// Route::Resource('article/', [ArticleController::class]);
// Route::apiResource('user/', [UserController::class]);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });