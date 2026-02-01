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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name',32);
            $table->unsignedInteger('capacity')->nullable();
            $table->enum('status', ['free','occupied','reserved'])->default('free');
            $table->boolean('is_active')->default(true);
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained('zones');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['restaurant_id', 'name']);
            $table->index(['restaurant_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
