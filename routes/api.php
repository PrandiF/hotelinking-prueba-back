<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PromoCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/offers', [OfferController::class, 'index']);
Route::post('/offers', [OfferController::class, 'store']);
Route::put('/offers/{id}/status', [OfferController::class, 'updateStatus']);

Route::post('/promo-codes', [PromoCodeController::class, 'store']);
Route::get('/promo-codes', [PromoCodeController::class, 'index']);
Route::put('/promo-codes/{id}/redeem', [PromoCodeController::class, 'redeemPromoCode']);
