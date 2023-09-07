<?php
namespace Database\Factories;

use App\Models\ProductVariant;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition(): array
    {
        $faker = $this->faker;
        $varientPrice = $faker->randomFloat(2, 5, 300);
        $varientDiscountPercentage = $faker->randomNumber(1); // Generate a random discount percentage
        
        // Calculate varient_selling_price based on varient_price and varient_discount
        $varientSellingPrice = $varientPrice - ($varientPrice * ($varientDiscountPercentage / 100));


        return [
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
            'quantity_per' => $faker->randomNumber(2),
            'unit' => $faker->randomNumber(1),
            'varient_price' => $varientPrice,
            'varient_selling_price' => $varientSellingPrice,
            'varient_discount' => $varientDiscountPercentage,
            'varient_stock' => $faker->randomNumber(5),
            'status' => $faker->randomElement(['1', '0']),
        ];
    }
}
