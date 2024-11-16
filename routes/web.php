<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("/home", [AdminHomeController::class, "index"])->name("admin.index")->middleware("admin:admin");
    
    /* login */
    Route::get("/login", [AdminLoginController::class, "index"])->name("admin.login");
    Route::post("/login-submit", [AdminLoginController::class, "submit_login"])->name("admin.login.submit");
    Route::get("/logout", [AdminLoginController::class, "logout"])->name("admin.logout");

    /* password */
    Route::get("/forget-password", [AdminLoginController::class, "forget_password"])->name("admin.login.forget");
    Route::post("/forget-submit", [AdminLoginController::class, "forget_submit"])->name("admin.login.forget.submit");
    Route::get("/reset-password/{token}/{email}", [AdminLoginController::class, "reset_password"])->name("admin.login.reset");
    Route::post("/reset-submit", [AdminLoginController::class, "reset_submit"])->name("admin.login.reset.submit");

    /* profile */
    Route::get("/profile", [AdminProfileController::class, "index"])->name("admin.profile")->middleware("admin:admin");
    Route::put("/profile/submit", [AdminProfileController::class, "submit_profile"])->name("admin.profile.submit")->middleware("admin:admin");

    /* slides */
    Route::get("/slides", [AdminSlideController::class, "index"])->name("admin.slides")->middleware("admin:admin");
    Route::get("/slide/add", [AdminSlideController::class, "add_slide"])->name("admin.slide.add")->middleware("admin:admin");
    Route::post("/slide/store", [AdminSlideController::class, "store_slide"])->name("admin.slide.store")->middleware("admin:admin");
    Route::get("/slide/edit/{slide_id}", [AdminSlideController::class, "edit_slide"])->name("admin.slide.edit")->middleware(("admin:admin"));
    Route::put("/slide/update", [AdminSlideController::class, "update_slide"])->name("admin.slide.update")->middleware("admin:admin");
    Route::delete("/slide/delete", [AdminSlideController::class, "delete_slide"])->name("admin.slide.delete")->middleware("admin:admin");
});

Route::prefix("/")->group( function () {
    Route::get("/", [HomeController::class, "index"])->name("front.index");
    Route::get("/about", [AboutController::class, "index"])->name("frong.about");
});

