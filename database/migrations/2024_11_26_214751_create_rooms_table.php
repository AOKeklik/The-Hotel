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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("description");
            $table->text("price");
            $table->text("amenities")->nullable();            
            $table->text("featured_photo");
            $table->text("video_id")->nullable();
            $table->text("size")->nullable();
            $table->text("total_rooms");
            $table->text("total_beds")->nullable();
            $table->text("total_bathrooms")->nullable();
            $table->text("total_balconies")->nullable();
            $table->text("total_guests")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
