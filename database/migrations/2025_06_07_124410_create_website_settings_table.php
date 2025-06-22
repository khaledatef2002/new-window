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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('logo');
            $table->string('cover');
            $table->string('keywords');
            $table->string('facebook_url');
            $table->string('instagram_url');
            $table->string('twitter_url');
            $table->string('youtube_url');
            $table->string('tiktok_url');
            $table->string('snapchat_url');
            $table->string('phone_number');
            $table->string('phone_number2')->nullable();
            $table->string('email');
            $table->string('location');
            $table->string('footer_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
