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
            $table->foreignID('category_id')->constrained()->onDelete('cascade');
            $table->foreignID('subcategory_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('titel');
            $table->string('slug');
            $table->text('description');
            $table->double('price');
            $table->double('selling_price');
            $table->enum('is_featured', ['1', '0'])->default('0');
            $table->string('sku');
            $table->string('barcode');
            $table->enum('track_stock', ['1', '0'])->default('0');
            $table->integer('quantity')->nullable()->default(0);
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamps();
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
