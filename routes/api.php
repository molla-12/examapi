<?php

use App\Http\Controllers\API\WebsiteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
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

Route::apiResource('websites', WebsiteController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('subscribe', SubscriptionController::class);
