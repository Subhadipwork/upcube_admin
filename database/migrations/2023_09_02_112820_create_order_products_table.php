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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('order_lists')->onDelete('cascade');
            $table->string('invoice_no');
            $table->foreign('invoice_no')->references('invoice_no')->on('order_lists')->onDelete('cascade');
            // ifvarient add then
            // $table->unsignedBigInteger('product_variant_id');
            // $table->foreign('product_variant_id')->references('id')->on('product_variants');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->double('product_price');
            $table->integer('quantity');
            $table->double('total_price');
            $table->double('total_gst')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
