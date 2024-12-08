<?php

use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\Customer\CustomerProfileController;
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
use App\Http\Controllers\Front\BookingController;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    /* login */
    Route::get("login", [AdminAuthController::class, "login"])->name("admin.login");
    Route::post("login/submit", [AdminAuthController::class, "submit_login"])->name("admin.login.submit");
    Route::get("logout", [AdminAuthController::class, "logout"])->name("admin.logout");

    /* reset password */
    Route::get("reset/{token}/{email}", [AdminAuthController::class, "reset"])->name("admin.reset");
    Route::post("reset/submit", [AdminAuthController::class, "submit_reset"])->name("admin.reset.submit");
    Route::get("forget", [AdminAuthController::class, "forget"])->name("admin.forget");
    Route::post("forget/submit", [AdminAuthController::class, "submit_forget"])->name("admin.forget.submit");
});

Route::prefix("admin")->middleware(["admin:admin"])->group(function () {
    Route::get("", [AdminHomeController::class, "index"])->name("admin.index");

    /* profile */
    Route::get("profile", [AdminProfileController::class, "index"])->name("admin.profile");
    Route::put("profile/submit", [AdminProfileController::class, "submit_profile"])->name("admin.profile.submit");

    /* slides */
    Route::get("slides", [AdminSlideController::class, "index"])->name("admin.slides");
    Route::get("slide/add", [AdminSlideController::class, "add_slide"])->name("admin.slide.add");
    Route::post("slide/store", [AdminSlideController::class, "store_slide"])->name("admin.slide.store");
    Route::get("slide/edit/{slide_id}", [AdminSlideController::class, "edit_slide"])->name("admin.slide.edit");
    Route::put("slide/update", [AdminSlideController::class, "update_slide"])->name("admin.slide.update");
    Route::delete("slide/delete", [AdminSlideController::class, "delete_slide"])->name("admin.slide.delete");

    /* features */
    Route::get("features", [AdminFeatureController::class, "index"])->name("admin.features");
    Route::get("feature/add", [AdminFeatureController::class, "add_feature"])->name("admin.feature.add");
    Route::post("feature/store", [AdminFeatureController::class, "store_feature"])->name("admin.feature.store");
    Route::get("feature/edit/{feature_id}", [AdminFeatureController::class, "edit_feature"])->name("admin.feature.edit");
    Route::put("feature/update", [AdminFeatureController::class, "update_feature"])->name("admin.feature.update");
    Route::get("feature/delete/{feature_id}", [AdminFeatureController::class, "delete_feature"])->name("admin.feature.delete");

    /* testimonials */
    Route::get("testimonials", [AdminTestimonialController::class, "index"])->name("admin.testimonials");
    Route::get("testimonial/add", [AdminTestimonialController::class, "add_testimonial"])->name("admin.testimonial.add");
    Route::post("testimonial/store", [AdminTestimonialController::class, "store_testimonial"])->name("admin.testimonial.store");
    Route::get("testimonial/edit/{testimonial_id}", [AdminTestimonialController::class, "edit_testimonial"])->name("admin.testimonial.edit");
    Route::put("testimonial/update", [AdminTestimonialController::class, "update_testimonial"])->name("admin.testimonial.update");
    Route::get("testimonial/delete/{testimonial_id}", [AdminTestimonialController::class, "delete_testimonial"])->name("admin.testimonial.delete");

    /* blogs */
    Route::get("posts", [AdminPostController::class, "index"])->name("admin.posts");
    Route::get("post/add", [AdminPostController::class, "add_post"])->name("admin.post.add");
    Route::post("post/store", [AdminPostController::class, "store_post"])->name("admin.post.store");
    Route::get("post/edit/{post_id}", [AdminPostController::class, "edit_post"])->name("admin.post.edit");
    Route::put("post/update", [AdminPostController::class, "update_post"])->name("admin.post.update");
    Route::get("post/delete/{post_id}", [AdminPostController::class, "delete_post"])->name("admin.post.delete");

    /* photo galery */
    Route::get("photos", [AdminPhotoController::class, "index"])->name("admin.photos");
    Route::get("photo/add", [AdminPhotoController::class, "add_photo"])->name("admin.photo.add");
    Route::post("photo/store", [AdminPhotoController::class, "store_photo"])->name("admin.photo.store");
    Route::get("photo/edit/{photo_id}", [AdminPhotoController::class, "edit_photo"])->name("admin.photo.edit");
    Route::put("photo/update", [AdminPhotoController::class, "update_photo"])->name("admin.photo.update");
    Route::get("photo/delete/{photo_id}", [AdminPhotoController::class, "delete_photo"])->name("admin.photo.delete");

    /* video galery */
    Route::get("videos", [AdminVideoController::class, "index"])->name("admin.videos");
    Route::get("video/add", [AdminVideoController::class, "add_video"])->name("admin.video.add");
    Route::post("video/store", [AdminVideoController::class, "store_video"])->name("admin.video.store");
    Route::get("video/edit/{video_id}", [AdminVideoController::class, "edit_video"])->name("admin.video.edit");
    Route::put("video/update", [AdminVideoController::class, "update_video"])->name("admin.video.update");
    Route::get("video/delete/{video_id}", [AdminVideoController::class, "delete_video"])->name("admin.video.delete");

    /* faq */
    Route::get("faqs", [AdminFaqController::class, "index"])->name("admin.faqs");
    Route::get("faq/add", [AdminFaqController::class, "add_faq"])->name("admin.faq.add");
    Route::post("faq/store", [AdminFaqController::class, "store_faq"])->name("admin.faq.store");
    Route::get("faq/edit/{faq_id}", [AdminFaqController::class, "edit_faq"])->name("admin.faq.edit");
    Route::put("faq/update", [AdminFaqController::class, "update_faq"])->name("admin.faq.update");
    Route::get("faq/delete/{faq_id}", [AdminFaqController::class, "delete_faq"])->name("admin.faq.delete");

    /* subscriber */
    Route::get("subscribers", [AdminSubscriberController::class, "index"])->name("admin.subscribers");
    Route::get("subscriber/edit/{subscriber_id}", [AdminSubscriberController::class, "edit_subscriber"])->name("admin.subscriber.edit");
    Route::put("subscriber/update", [AdminSubscriberController::class, "update_subscriber"])->name("admin.subscriber.update");
    Route::get("subscriber/email", [AdminSubscriberController::class, "email_subscriber"])->name("admin.subscriber.email");
    Route::post("subscriber/email/update", [AdminSubscriberController::class, "submit_subscriber"])->name("admin.subscriber.email.submit");
    Route::get("subscriber/delete/{subscriber_id}", [AdminSubscriberController::class, "delete_subscriber"])->name("admin.subscriber.delete");

    /* amenity */
    Route::get("hotel/amenities", [AdminAmenityController::class, "index"])->name("admin.hotel.amenities");
    Route::get("hotel/amenity/add", [AdminAmenityController::class, "add_amenity"])->name("admin.hotel.amenity.add");
    Route::post("hotel/amenity/store", [AdminAmenityController::class, "store_amenity"])->name("admin.hotel.amenity.store");
    Route::get("hotel/amenity/edit/{amenity_id}", [AdminAmenityController::class, "edit_amenity"])->name("admin.hotel.amenity.edit");
    Route::put("hotel/amenity/update", [AdminAmenityController::class, "update_amenity"])->name("admin.hotel.amenity.update");
    Route::get("hotel/amenity/delete/{amenity_id}", [AdminAmenityController::class, "delete_amenity"])->name("admin.hotel.amenity.delete");

    /* room */
    Route::get("hotel/rooms", [AdminRoomController::class, "index"])->name("admin.hotel.rooms");
    Route::get("hotel/room/add", [AdminRoomController::class, "add_room"])->name("admin.hotel.room.add");
    Route::post("hotel/room/store",[AdminRoomController::class, "store_room"])->name("admin.hotel.room.store");
    Route::get("hotel/room/edit/{room_id}", [AdminRoomController::class, "edit_room"])->name("admin.hotel.room.edit");
    Route::put("hotel/room/update", [AdminRoomController::class, "update_room"])->name("admin.hotel.room.update");
    Route::get("hotel/room/delete/{room_id}", [AdminRoomController::class, "delete_room"])->name("admin.hotel.room.delete");
    Route::get("hotel/room/gallery/{room_id}", [AdminRoomController::class, "gallery_room"])->name("admin.hotel.room.gallery");
    Route::post("hotel/room/gallery/store", [AdminRoomController::class, "store_gallery_room"])->name("admin.hotel.room.gallery.store");
    Route::get("hote/room/gallery/edit/{gallery_id}", [AdminRoomController::class, "edit_gallery_room"])->name("admin.hotel.room.gallery.edit");
    Route::put("hotel/room/gallery/update",[AdminRoomController::class, "update_gallery_room"])->name("admin.hotel.room.gallery.update");
    Route::get("hotel/room/gallery/delete/{gallery_id}", [AdminRoomController::class, "delete_gallery_room"])->name("admin.hotel.room.gallery.delete");

    /* pages */
    Route::get("page/about/edit", [AdminPageController::class, "edit_about"])->name("admin.page.about.edit");
    Route::put("page/about/update", [AdminPageController::class, "update_about"])->name("admin.page.about.update");
    Route::get("page/rooms/edit", [AdminPageController::class, "edit_rooms"])->name("admin.page.rooms.edit");
    Route::put("page/rooms/update", [AdminPageController::class, "update_rooms"])->name("admin.page.rooms.update");
    Route::get("page/photo/edit", [AdminPageController::class, "edit_photo"])->name("admin.page.photo.edit");
    Route::put("page/photo/update", [AdminPageController::class, "update_photo"])->name("admin.page.photo.update");
    Route::get("page/video/edit", [AdminPageController::class, "edit_video"])->name("admin.page.video.edit");
    Route::put("page/video/update", [AdminPageController::class, "update_video"])->name("admin.page.video.update");
    Route::get("page/blog/edit", [AdminPageController::class, "edit_blog"])->name("admin.page.blog.edit");
    Route::put("page/blog/update", [AdminPageController::class, "update_blog"])->name("admin.page.blog.update");
    Route::get("page/contact/edit", [AdminPageController::class, "edit_contact"])->name("admin.page.contact.edit");
    Route::put("page/contact/update", [AdminPageController::class, "update_contact"])->name("admin.page.contact.update");
    Route::get("page/cart/edit", [AdminPageController::class, "edit_cart"])->name("admin.page.cart.edit");
    Route::put("page/cart/update", [AdminPageController::class, "update_cart"])->name("admin.page.cart.update");
    Route::get("page/checkout/edit", [AdminPageController::class, "edit_checkout"])->name("admin.page.checkout.edit");
    Route::put("page/checkout/update", [AdminPageController::class, "update_checkout"])->name("admin.page.checkout.update");
    Route::get("page/payment/edit", [AdminPageController::class, "edit_payment"])->name("admin.page.payment.edit");
    Route::put("page/payment/update", [AdminPageController::class, "update_payment"])->name("admin.page.payment.update");
    Route::get("page/terms/edit", [AdminPageController::class, "edit_terms"])->name("admin.page.terms.edit");
    Route::put("page/terms/update", [AdminPageController::class, "update_terms"])->name("admin.page.terms.update");
    Route::get("page/policy/edit", [AdminPageController::class, "edit_policy"])->name("admin.page.policy.edit");
    Route::put("page/policy/update", [AdminPageController::class, "update_policy"])->name("admin.page.policy.update");
    Route::get("page/faq/edit",[AdminPageController::class, "edit_faq"])->name("admin.page.faq.edit");
    Route::put("page/faq/update", [AdminPageController::class, "update_faq"])->name("admin.page.faq.update");
    Route::get("page/customer/edit", [AdminPageController::class, "edit_customer"])->name("admin.page.customer.edit");
    Route::put("page/customer/update", [AdminPageController::class, "update_customer"])->name("admin.page.customer.update");
});

Route::prefix("customer")->group(function () {
    /* login */
    Route::get("login", [CustomerAuthController::class, "login"])->name("customer.login");
    Route::post("login/submit", [CustomerAuthController::class, "submit_login"])->name("customer.login.submit");
    Route::get("logout", [CustomerAuthController::class, "logout"])->name("customer.logout");
    Route::get("signup", [CustomerAuthController::class, "signup"])->name("customer.signup");
    Route::post("signup/submit", [CustomerAuthController::class, "submit_signup"])->name("customer.signup.submit");
    Route::get("signup/verification/{token}/{email}", [CustomerAuthController::class, "verification_signup"])->name("customer.signup.verification");

    /* reset pass */
    Route::get("forget", [CustomerAuthController::class, "forget"])->name("customer.forget");
    Route::post("forget/submit", [CustomerAuthController::class, "submit_forget"])->name("customer.forget.submit");
    Route::get("reset/{token}/{email}", [CustomerAuthController::class, "reset"])->name("customer.reset");
    Route::post("reset/submit", [CustomerAuthController::class, "submit_reset"])->name("customer.reset.submit");
});

Route::prefix("customer")->middleware(["customer:customer"])->group( function () {
    Route::get("", [CustomerHomeController::class, "index"])->name("customer.index");

    /* profile */
    Route::get("profile/edit", [CustomerProfileController::class, "edit_profile"])->name("customer.profile.edit");
    Route::put("profile/update", [CustomerProfileController::class, "update_profile"])->name("customer.profile.update");

    Route::get("orders", [CustomerOrderController::class, "index"])->name("customer.orders");
    Route::get("order/{order_id}", [CustomerOrderController::class, "order"])->name("customer.order");
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

    /* booking */
    Route::get("cart", [BookingController::class, "cart"])->name("front.cart");
    Route::post("cart/submit", [BookingController::class, "submit_cart"])->name("front.cart.submit");
    Route::get("cart/item/delete/{item_id}", [BookingController::class, "delete_item_cart"])->name("front.cart.item.delete");
    Route::get("checkout", [BookingController::class, "checkout"])->name("front.checkout");
    Route::post("checkout/submit", [BookingController::class, "submit_checkout"])->name("front.checkout.submit");
    Route::get("payment", [BookingController::class, "payment"])->name("front.payment");
    Route::post("payment/stripe", [BookingController::class, "stripe"])->name("front.payment.stripe");
});

