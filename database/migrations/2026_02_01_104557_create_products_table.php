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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',128);
            $table->string('slug',128);
            $table->string('image',128)->nullable();
            $table->string('description',255)->nullable();
            $table->decimal('price',8,2);
            $table->decimal('cost',8,2)->nullable();
            $table->decimal('discount',8,2)->default(0);
            $table->enum('unit', ['portion','g','kg','piece'])->default('portion');
            $table->decimal('unit_quantity',8,2)->default(0);
            $table->enum('sell_mode', ['fixed_unit', 'custom_amount'])->default('fixed_unit');
            $table->decimal('tax_rate', 5, 2)->default(0);
            $table->string('barcode',128)->nullable()->unique();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['restaurant_id','slug']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
