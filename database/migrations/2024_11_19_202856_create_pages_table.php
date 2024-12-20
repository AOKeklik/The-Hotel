<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            
            $table->text("about_heading");
            $table->text("about_content");
            $table->integer("about_status");
            
            $table->text("photo_heading");
            $table->integer("photo_status");

            $table->text("video_heading");    
            $table->integer("video_status");

            $table->text("blog_heading");
            $table->integer("blog_status");
        
            $table->text("contact_heading");
            $table->text("contact_content");
            $table->integer("contact_status");  

            $table->text("cart_heading");
            $table->text("cart_status");
            
            $table->text("checkout_heading");
            $table->text("checkout_status");
            $table->text("payment_heading");

            $table->text("terms_heading");
            $table->text("terms_content");
            $table->integer("terms_status");
            
            $table->text("policy_heading");
            $table->text("policy_content");
            $table->integer("policy_status");  
        
            $table->text("faq_heading");
            $table->text("faq_status");

            $table->text("room_heading");
            $table->integer("room_status");

            $table->text("customer_login_heading");
            $table->text("customer_signup_heading");            
            $table->text("customer_forget_heading");            
            $table->text("customer_reset_heading"); 
            $table->text("customer_signup_status");            
            $table->text("customer_login_status");                      
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
