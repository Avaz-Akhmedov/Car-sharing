<?php

use App\Http\Controllers\CalculatePriceController;
use App\Http\Controllers\RateController;
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


Route::resource("rates", RateController::class)
    ->only(["index", "show"]);

Route::post("/calculate-price", CalculatePriceController::class)->name("calculate.price");