<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post("login", [LoginController::class, "submit"]);
Route::post("login/verify", [LoginController::class, "verify"]);


Route::middleware('auth:sanctum')->group(function () {
    Route::get("driver", [DriverController::class, "show"]);
    Route::put("driver", [DriverController::class, "update"]);


});
