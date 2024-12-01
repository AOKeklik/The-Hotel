<?php

use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\GalleryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PolicyController;
use App\Http\Controllers\Front\RoomController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\TermsController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("home", [AdminHomeController::class, "index"])->name("admin.index")->middleware("admin:admin");
    
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

    /* subscriber */
    Route::get("subscribers", [AdminSubscriberController::class, "index"])->name("admin.subscribers")->middleware("admin:admin");
    Route::get("subscriber/edit/{subscriber_id}", [AdminSubscriberController::class, "edit_subscriber"])->name("admin.subscriber.edit")->middleware("admin:admin");
    Route::get("subscriber/email", [AdminSubscriberController::class, "email_subscriber"])->name("admin.subscriber.email")->middleware("admin:admin");
    Route::put("subscriber/update", [AdminSubscriberController::class, "update_subscriber"])->name("admin.subscriber.update")->middleware("admin:admin");
    Route::get("subscriber/delete/{subscriber_id}", [AdminSubscriberController::class, "delete_subscriber"])->name("admin.subscriber.delete")->middleware("admin:admin");
    Route::post("subscriber/email/update", [AdminSubscriberController::class, "submit_subscriber"])->name("admin.subscriber.email.submit")->middleware("admin:admin");

    /* amenity */
    Route::get("hotel/amenities", [AdminAmenityController::class, "index"])->name("admin.hotel.amenities")->middleware("admin:admin");
    Route::get("hotel/amenity/add", [AdminAmenityController::class, "add_amenity"])->name("admin.hotel.amenity.add")->middleware("admin:admin");
    Route::get("hotel/amenity/edit/{amenity_id}", [AdminAmenityController::class, "edit_amenity"])->name("admin.hotel.amenity.edit")->middleware("admin:admin");
    Route::get("hotel/amenity/delete/{amenity_id}", [AdminAmenityController::class, "delete_amenity"])->name("admin.hotel.amenity.delete")->middleware("admin:admin");
    Route::post("hotel/amenity/store", [AdminAmenityController::class, "store_amenity"])->name("admin.hotel.amenity.store")->middleware("admin:admin");
    Route::put("hotel/amenity/update", [AdminAmenityController::class, "update_amenity"])->name("admin.hotel.amenity.update")->middleware(("admin:admin"));

    /* room */
    Route::get("hotel/rooms", [AdminRoomController::class, "index"])->name("admin.hotel.rooms")->middleware("admin:admin");
    Route::get("hotel/room/add", [AdminRoomController::class, "add_room"])->name("admin.hotel.room.add")->middleware("admin:admin");
    Route::get("hotel/room/edit/{room_id}", [AdminRoomController::class, "edit_room"])->name("admin.hotel.room.edit")->middleware("admin:admin");
    Route::get("hotel/room/delete/{room_id}", [AdminRoomController::class, "delete_room"])->name("admin.hotel.room.delete")->middleware("admin:admin");
    Route::post("hotel/room/store",[AdminRoomController::class, "store_room"])->name("admin.hotel.room.store")->middleware("admin:admin");
    Route::put("hotel/room/update", [AdminRoomController::class, "update_room"])->name("admin.hotel.room.update")->middleware("admin:admin");
    Route::get("hotel/room/gallery/{room_id}", [AdminRoomController::class, "gallery_room"])->name("admin.hotel.room.gallery")->middleware("admin:admin");
    Route::post("hotel/room/gallery/store", [AdminRoomController::class, "store_gallery_room"])->name("admin.hotel.room.gallery.store")->middleware("admin:admin");
    Route::get("hote/room/gallery/edit/{gallery_id}", [AdminRoomController::class, "edit_gallery_room"])->name("admin.hotel.room.gallery.edit")->middleware("admin:admin");
    Route::get("hotel/room/gallery/delete/{gallery_id}", [AdminRoomController::class, "delete_gallery_room"])->name("admin.hotel.room.gallery.delete")->middleware("admin:admin");
    Route::put("hotel/room/gallery/update",[AdminRoomController::class, "update_gallery_room"])->name("admin.hotel.room.gallery.update")->middleware("admin:admin");

    /* pages */
    Route::get("page/about/edit", [AdminPageController::class, "edit_about"])->name("admin.page.about.edit")->middleware("admin:admin");
    Route::put("page/about/update", [AdminPageController::class, "update_about"])->name("admin.page.about.update")->middleware("admin:admin");
    Route::get("page/rooms/edit", [AdminPageController::class, "edit_rooms"])->name("admin.page.rooms.edit")->middleware("admin:admin");
    Route::put("page/rooms/update", [AdminPageController::class, "update_rooms"])->name("admin.page.rooms.update")->middleware("admin:admin");
    Route::get("page/photo/edit", [AdminPageController::class, "edit_photo"])->name("admin.page.photo.edit")->middleware("admin:admin");
    Route::put("page/photo/update", [AdminPageController::class, "update_photo"])->name("admin.page.photo.update")->middleware("admin:admin");
    Route::get("page/video/edit", [AdminPageController::class, "edit_video"])->name("admin.page.video.edit")->middleware("admin:admin");
    Route::put("page/video/update", [AdminPageController::class, "update_video"])->name("admin.page.video.update")->middleware("admin:admin");
    Route::get("page/blog/edit", [AdminPageController::class, "edit_blog"])->name("admin.page.blog.edit")->middleware("admin:admin");
    Route::put("page/blog/update", [AdminPageController::class, "update_blog"])->name("admin.page.blog.update")->middleware("admin:admin");
    Route::get("page/contact/edit", [AdminPageController::class, "edit_contact"])->name("admin.page.contact.edit")->middleware("admin:admin");
    Route::put("page/contact/update", [AdminPageController::class, "update_contact"])->name("admin.page.contact.update")->middleware("admin:admin");
    Route::get("page/cart/edit", [AdminPageController::class, "edit_cart"])->name("admin.page.cart.edit")->middleware("admin:admin");
    Route::put("page/cart/update", [AdminPageController::class, "update_cart"])->name("admin.page.cart.update")->middleware("admin:admin");
    Route::get("page/checkout/edit", [AdminPageController::class, "edit_checkout"])->name("admin.page.checkout.edit")->middleware("admin:admin");
    Route::put("page/checkout/update", [AdminPageController::class, "update_checkout"])->name("admin.page.checkout.update")->middleware("admin:admin");
    Route::get("page/payment/edit", [AdminPageController::class, "edit_payment"])->name("admin.page.payment.edit")->middleware("admin:admin");
    Route::put("page/payment/update", [AdminPageController::class, "update_payment"])->name("admin.page.payment.update")->middleware("admin:admin");
    Route::get("page/terms/edit", [AdminPageController::class, "edit_terms"])->name("admin.page.terms.edit")->middleware("admin:admin");
    Route::put("page/terms/update", [AdminPageController::class, "update_terms"])->name("admin.page.terms.update")->middleware("admin:admin");
    Route::get("page/policy/edit", [AdminPageController::class, "edit_policy"])->name("admin.page.policy.edit")->middleware("admin:admin");
    Route::put("page/policy/update", [AdminPageController::class, "update_policy"])->name("admin.page.policy.update")->middleware("admin:admin");
    Route::get("page/faq/edit",[AdminPageController::class, "edit_faq"])->name("admin.page.faq.edit")->middleware("admin:admin");
    Route::put("page/faq/update", [AdminPageController::class, "update_faq"])->name("admin.page.faq.update")->middleware("admin:admin");
});

Route::prefix("/")->group( function () {
    Route::get("", [HomeController::class, "index"])->name("front.index");
    Route::get("about", [AboutController::class, "index"])->name("front.about");

    Route::get("contact", [ContactController::class, "index"])->name("front.contact");
    Route::post("contact/submit", [ContactController::class, "submit_contact"])->name("front.contact.submit");

    Route::get("blog", [BlogController::class, "index"])->name("front.blog");
    Route::get("blog/{post_id}", [BlogController::class, "post"])->name("front.blog.detail");

    Route::post("subscriber/submit", [SubscriberController::class, "submit_subscriber"])->name("front.subscriber.submit");
    Route::get("subscriber/verify/{email}/{token}", [SubscriberController::class, "verify_subscriber"])->name("front.subscriber.verify");

    Route::get("rooms", [RoomController::class, "index"])->name("front.rooms");
    Route::get("room/{room_id}", [RoomController::class, "room"])->name("front.room");
    
    Route::get("photos", [GalleryController::class, "photos"])->name("front.photos");
    Route::get("videos", [GalleryController::class, "videos"])->name("front.videos");
    Route::get("faq", [FaqController::class, "index"])->name("front.faq");
    Route::get("terms", [TermsController::class, "index"])->name("front.terms");
    Route::get("policy", [PolicyController::class, "index"])->name("front.policy");
});

