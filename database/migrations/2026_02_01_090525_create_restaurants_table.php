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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name',128);
            $table->string('slug',128)->unique();
            $table->text('description')->nullable();
            $table->string('logo',128)->nullable();
            $table->string('slogan',128)->nullable();
            $table->string('address',128)->nullable();
            $table->string('color',8)->nullable();
            $table->string('phone',32)->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('postal_code')->nullable();
            $table->json('opening_hours')->nullable();
            $table->json('social_links')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('type', ['restaurant', 'tea_room','cafe'])->default('restaurant');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
