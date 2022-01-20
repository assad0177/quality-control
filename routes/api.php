<?php

use App\Http\Controllers\API\ApiController;
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


Route::get('/get-plan-test', [ApiController::class, 'getPlanTest']);
// Route::post('login', [RegisterController::class, 'login']);

// Route::middleware('auth:api')->group( function () {
//     Route::resource('products', ProductController::class);
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
