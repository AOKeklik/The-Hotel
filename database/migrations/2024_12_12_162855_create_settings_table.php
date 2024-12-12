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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text("favicon");
            $table->text("logo");
            $table->text("top_phono")->nullable();
            $table->text("top_email")->nullable();
            $table->text("footer_address")->nullable();
            $table->text("footer_email")->nullable();
            $table->text("footer_phone")->nullable();
            $table->text("footer_copyright")->nullable();

            $table->text("footer_facebook")->nullable();
            $table->text("footer_twitter")->nullable();
            $table->text("footer_pinterest")->nullable();
            $table->text("footer_linkedin")->nullable();
            $table->text("footer_instagram")->nullable();
            
            $table->text("theme_color_1");
            $table->text("theme_color_2");
            $table->text("analytic_id")->nullable();

            $table->integer("home_feature_limit")->default(4);
            $table->integer("home_feature_status")->default(0);
            $table->integer("home_room_limit")->default(4);
            $table->integer("home_room_status")->default(0);
            $table->integer("home_testimonial_status")->default(0);
            $table->integer("home_post_limit")->default(4);
            $table->integer("home_post_status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
