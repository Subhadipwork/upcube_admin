<?php

namespace Database\Factories;

use App\Models\OrderList;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    protected $model = OrderProduct::class;

    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $quantity = $this->faker->numberBetween(1, 5);
        $product_price = $product->price ?? $this->faker->randomFloat(2, 10, 1000);
        $total_price = $quantity * $product_price;
        
        return [
            'order_id' => OrderList::factory(),
            'invoice_no' => OrderList::inRandomOrder()->first()->invoice_no,
            'product_id' => $product->id,
            'product_price' => $product_price,
            'quantity' => $quantity,
            'total_price' => $total_price,
            'total_gst' => $total_price * 0.18 // Assuming a GST of 18%, adjust accordingly
        ];
    }
}
