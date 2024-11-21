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

            $table->text("terms_title")->nullable();
            $table->text("terms_heading");
            $table->text("terms_content");
            $table->integer("terms_status");
            
            $table->text("policy_title")->nullable();
            $table->text("policy_heading");
            $table->text("policy_content");
            $table->integer("policy_status");
            
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