<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Public routes
// Route::post('/register', [RegisterController::class, 'store']);
// Route::post('/login', [LoginController::class, 'login']);
// // Route::get('/products', [ProductController::class, 'index']);
// // Route::get('/products/{id}', [ProductController::class, 'show']);
// // Route::get('/products/search/{name}', [ProductController::class, 'search']);

// // Protected routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     // Route::post('/products', [ProductController::class, 'store']);
//     // Route::put('/products/{id}', [ProductController::class, 'update']);
//     // Route::delete('/products/{id}', [ProductController::class, 'destroy']);

//     Route::post('/logout', [LoginController::class, 'logout']);
// });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
