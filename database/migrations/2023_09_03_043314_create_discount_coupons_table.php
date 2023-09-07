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
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('max_users')->nullable();
            $table->unsignedInteger('max_users_per_coupon')->nullable();
            $table->enum('type', ['fixed', 'percent'])->default('fixed');
            $table->integer('discount_amount')->default(0);
            $table->double('min_amount')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_coupons');
    }
};
