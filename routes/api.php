<?php

use App\Http\Controllers\api\AuthController as ApiAuthController;
use App\Http\Controllers\api\V1\AuthController;
use App\Http\Controllers\api\V1\productController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){

    Route::get('product',[productController::class,'index']);
    Route::post('product/store',[productController::class,'store']);
    Route::put('product/update/{id}',[productController::class,'update']);
    Route::delete('product/destroy/{id}',[productController::class,'destroy']);
});

Route::middleware('throttle:custome-limit')->group(function(){
Route::post('register',[AuthController::class,'Register']);
Route::post('login',[AuthController::class,'Login']);
});

// Route::middleware('throttle:custome-limit')->group(function(){
//    Route::post('register',[AuthController::class,'Register']);
//  Route::post('login',[AuthController::class,'Login']); 
// });


// Route::post('register',[AuthController::class,'Register']);
// Route::post('login',[AuthController::class,'Login'])->middleware('throttle:3,5');

// Route::apiResource('product',ProductController::class);