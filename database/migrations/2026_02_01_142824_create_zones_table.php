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
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->unsignedInteger('order')->default(0);
            $table->foreignId('restaurant_id')->constrained();
            $table->string('color',8)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['restaurant_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};
