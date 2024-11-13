<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("/home", [AdminHomeController::class, "index"])->name("admin.index")->middleware("admin:admin");
    Route::get("/login", [AdminLoginController::class, "index"])->name("admin.login");
    Route::get("/forget-password", [AdminLoginController::class, "forget_password"])->name("admin.login.forget");
    Route::post("/login-submit", [AdminLoginController::class, "submit_login"])->name("admin.login.submit");
    Route::get("/logout", [AdminLoginController::class, "logout"])->name("admin.logout");
});

