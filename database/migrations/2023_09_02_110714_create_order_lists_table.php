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
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->double('subtotal');
            $table->double('grandtotal');
            $table->double('delivery_charge')->default(0);
            $table->double('discount_amount')->nullable();
            $table->integer('discount_type')->nullable();
            $table->double('gst')->nullable();
            $table->enum('status', ['placed','accepted','shipped','out for delivery','delivered', 'cancelled', 'returned']);
            // user address
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode');
            $table->text('landmark')->nullable();
            $table->string('notes')->nullable();
            // payment
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->double('coupon_amount')->nullable();

            // time
            $table->timestamp('order_date');
            $table->timestamp('accepted_date')->nullable();
            $table->timestamp('shipped_date')->nullable();
            $table->timestamp('out_for_delivery_date')->nullable();
            $table->timestamp('delivered_date')->nullable();
            $table->timestamp('cancelled_date')->nullable();
            $table->timestamp('returned_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_lists');
    }
};
