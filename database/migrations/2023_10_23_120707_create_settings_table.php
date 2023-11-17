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
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile_phone_1')->nullable();
            $table->string('mobile_phone_2')->nullable();
            $table->string('email_address_1')->nullable();
            $table->string('email_address_2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('location')->nullable();
            $table->string('title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('keywords')->nullable();
            $table->string('google_analytics_link')->nullable();
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
