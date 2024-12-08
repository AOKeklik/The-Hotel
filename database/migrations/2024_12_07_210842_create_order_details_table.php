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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer("order_id");
            $table->integer("room_id");
            $table->text("checkin_date");
            $table->text("checkout_date");
            $table->text("adult");
            $table->text("children");
            $table->text("subtotal");
            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade");
            $table->foreign("room_id")->references("id")->on("rooms")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
