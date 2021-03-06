<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('comments', CommentsController::class);
Route::apiResource('posts', PostsController::class);
Route::put('posts/upvote/{post}', [PostsController::class, 'upvotePost']);