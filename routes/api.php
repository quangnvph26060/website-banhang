<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// category
Route::prefix('category')->group(function (){
    Route::get('/',[\App\Http\Controllers\Api\ApiCategoryController::class,'index']);
    Route::post('/add',[\App\Http\Controllers\Api\ApiCategoryController::class,'store']);
    Route::get('/{id}',[\App\Http\Controllers\Api\ApiCategoryController::class,'show']);
    Route::put('/{id}',[\App\Http\Controllers\Api\ApiCategoryController::class,'update']);
    Route::delete('/{id}',[\App\Http\Controllers\Api\ApiCategoryController::class,'destroy']);
});
