<?php

use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\GalleryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("/home", [AdminHomeController::class, "index"])->name("admin.index")->middleware("admin:admin");
    
    /* login */
    Route::get("login", [AdminLoginController::class, "index"])->name("admin.login");
    Route::get("logout", [AdminLoginController::class, "logout"])->name("admin.logout");
    Route::post("login-submit", [AdminLoginController::class, "submit_login"])->name("admin.login.submit");

    /* password */
    Route::get("forget-password", [AdminLoginController::class, "forget_password"])->name("admin.login.forget");
    Route::get("reset-password/{token}/{email}", [AdminLoginController::class, "reset_password"])->name("admin.login.reset");
    Route::post("forget-submit", [AdminLoginController::class, "forget_submit"])->name("admin.login.forget.submit");
    Route::post("reset-submit", [AdminLoginController::class, "reset_submit"])->name("admin.login.reset.submit");

    /* profile */
    Route::get("profile", [AdminProfileController::class, "index"])->name("admin.profile")->middleware("admin:admin");
    Route::put("profile/submit", [AdminProfileController::class, "submit_profile"])->name("admin.profile.submit")->middleware("admin:admin");

    /* slides */
    Route::get("slides", [AdminSlideController::class, "index"])->name("admin.slides")->middleware("admin:admin");
    Route::get("slide/add", [AdminSlideController::class, "add_slide"])->name("admin.slide.add")->middleware("admin:admin");
    Route::get("slide/edit/{slide_id}", [AdminSlideController::class, "edit_slide"])->name("admin.slide.edit")->middleware(("admin:admin"));
    Route::post("slide/store", [AdminSlideController::class, "store_slide"])->name("admin.slide.store")->middleware("admin:admin");
    Route::put("slide/update", [AdminSlideController::class, "update_slide"])->name("admin.slide.update")->middleware("admin:admin");
    Route::delete("slide/delete", [AdminSlideController::class, "delete_slide"])->name("admin.slide.delete")->middleware("admin:admin");

    /* features */
    Route::get("features", [AdminFeatureController::class, "index"])->name("admin.features")->middleware("admin:admin");
    Route::get("feature/add", [AdminFeatureController::class, "add_feature"])->name("admin.feature.add")->middleware("admin:admin");
    Route::get("feature/edit/{feature_id}", [AdminFeatureController::class, "edit_feature"])->name("admin.feature.edit")->middleware("admin:admin");
    Route::post("feature/store", [AdminFeatureController::class, "store_feature"])->name("admin.feature.store")->middleware("admin:admin");
    Route::put("feature/update", [AdminFeatureController::class, "update_feature"])->name("admin.feature.update");
    Route::get("feature/delete/{feature_id}", [AdminFeatureController::class, "delete_feature"])->name("admin.feature.delete")->middleware("admin:admin");

    /* testimonials */
    Route::get("testimonials", [AdminTestimonialController::class, "index"])->name("admin.testimonials")->middleware("admin:admin");
    Route::get("testimonial/add", [AdminTestimonialController::class, "add_testimonial"])->name("admin.testimonial.add")->middleware("admin:admin");
    Route::get("testimonial/edit/{testimonial_id}", [AdminTestimonialController::class, "edit_testimonial"])->name("admin.testimonial.edit")->middleware("admin:admin");
    Route::post("testimonial/store", [AdminTestimonialController::class, "store_testimonial"])->name("admin.testimonial.store")->middleware("admin:admin");
    Route::put("testimonial/update", [AdminTestimonialController::class, "update_testimonial"])->name("admin.testimonial.update")->middleware("admin:admin");
    Route::get("testimonial/delete/{testimonial_id}", [AdminTestimonialController::class, "delete_testimonial"])->name("admin.testimonial.delete")->middleware("admin:admin");

    /* blogs */
    Route::get("posts", [AdminPostController::class, "index"])->name("admin.posts")->middleware("admin:admin");
    Route::get("post/add", [AdminPostController::class, "add_post"])->name("admin.post.add")->middleware("admin:admin");
    Route::get("post/edit/{post_id}", [AdminPostController::class, "edit_post"])->name("admin.post.edit")->middleware("admin:admin");
    Route::post("post/store", [AdminPostController::class, "store_post"])->name("admin.post.store")->middleware("admin:admin");
    Route::put("post/update", [AdminPostController::class, "update_post"])->name("admin.post.update")->middleware("admin:admin");
    Route::get("post/delete/{post_id}", [AdminPostController::class, "delete_post"])->name("admin.post.delete")->middleware("admin:admin");

    /* photo galery */
    Route::get("photos", [AdminPhotoController::class, "index"])->name("admin.photos")->middleware("admin:admin");
    Route::get("photo/add", [AdminPhotoController::class, "add_photo"])->name("admin.photo.add")->middleware("admin:admin");
    Route::get("photo/edit/{photo_id}", [AdminPhotoController::class, "edit_photo"])->name("admin.photo.edit")->middleware("admin:admin");
    Route::post("photo/store", [AdminPhotoController::class, "store_photo"])->name("admin.photo.store")->middleware("admin:admin");
    Route::put("photo/update", [AdminPhotoController::class, "update_photo"])->name("admin.photo.update")->middleware("admin:admin");
    Route::get("photo/delete/{photo_id}", [AdminPhotoController::class, "delete_photo"])->name("admin.photo.delete")->middleware("admin:admin");

    /* video galery */
    Route::get("videos", [AdminVideoController::class, "index"])->name("admin.videos")->middleware("admin:admin");
    Route::get("video/add", [AdminVideoController::class, "add_video"])->name("admin.video.add")->middleware("admin:admin");
    Route::get("video/edit/{video_id}", [AdminVideoController::class, "edit_video"])->name("admin.video.edit")->middleware("admin:admin");
    Route::post("video/store", [AdminVideoController::class, "store_video"])->name("admin.video.store")->middleware("admin:admin");
    Route::put("video/update", [AdminVideoController::class, "update_video"])->name("admin.video.update")->middleware("admin:admin");
    Route::get("video/delete/{video_id}", [AdminVideoController::class, "delete_video"])->name("admin.video.delete")->middleware("admin:admin");

    /* faq */
    Route::get("faqs", [AdminFaqController::class, "index"])->name("admin.faqs")->middleware("admin:admin");
    Route::get("faq/add", [AdminFaqController::class, "add_faq"])->name("admin.faq.add")->middleware("admin:admin");
    Route::get("faq/edit/{faq_id}", [AdminFaqController::class, "edit_faq"])->name("admin.faq.edit")->middleware("admin:admin");
    Route::post("faq/store", [AdminFaqController::class, "store_faq"])->name("admin.faq.store")->middleware("admin:admin");
    Route::put("faq/update", [AdminFaqController::class, "update_faq"])->name("admin.faq.update")->middleware("admin:admin");
    Route::get("faq/delete/{faq_id}", [AdminFaqController::class, "delete_faq"])->name("admin.faq.delete")->middleware("admin:admin");

    /* pages */
    Route::get("page/about/edit", [AdminPageController::class, "edit_about"])->name("admin.page.about.edit")->middleware("admin:admin");
    Route::put("page/about/update", [AdminPageController::class, "update_about"])->name("admin.page.about.update")->middleware("admin:admin");
    Route::get("page/terms/edit", [AdminPageController::class, "edit_terms"])->name("admin.page.terms.edit")->middleware("admin:admin");
    Route::put("page/terms/update", [AdminPageController::class, "update_terms"])->name("admin.page.terms.update")->middleware("admin:admin");
});

Route::prefix("/")->group( function () {
    Route::get("", [HomeController::class, "index"])->name("front.index");
    Route::get("about", [AboutController::class, "index"])->name("front.about");
    Route::get("blog", [BlogController::class, "index"])->name("front.blog");
    Route::get("blog/{post_id}", [BlogController::class, "post"])->name("front.blog.detail");
    Route::get("photos", [GalleryController::class, "photos"])->name("front.photos");
    Route::get("videos", [GalleryController::class, "videos"])->name("front.videos");
    Route::get("faq", [FaqController::class, "index"])->name("front.faq");
    Route::get("terms", [TermsController::class, "index"])->name("front.terms");
});

