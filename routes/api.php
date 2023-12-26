<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/comment')->group(function () {
    Route::get('/{projectId}/get', [CommentsController::class, 'index'])->name('api.comment-get');
    Route::post('/{id}/store', [CommentsController::class, 'store'])->name('api.comment-store');
    Route::delete('/{id}/destroy', [CommentsController::class, 'destroy'])->name('api.comment-destroy');
});
