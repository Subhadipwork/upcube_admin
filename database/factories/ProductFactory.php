<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $price = $this->faker->randomFloat(2, 10, 100);
    $sellingPrice = $this->faker->randomFloat(2, 5, $price - 1);

    return [
        'category_id' => \App\Models\Category::factory(),
        // 'subcategory_id' => \App\Models\Subcategory::factory(),
        'subcategory_id' => $this->faker->randomElement(\App\Models\Subcategory::pluck('id')->toArray()),

        'brand_id' => \App\Models\Brand::factory(),
        'titel' => $this->faker->sentence,
        'slug' => $this->faker->slug,
        // 'description' => '<p>' . $this->faker->paragraph . '</p>',
        'description' => '<div class="prod">Product Description</div>'
    . '<div class="lazyload-wrapper">'
    . '<div class="DescriptionRevamp-sc-d946nb-0 eASHxS">'
    . '<p style="font-family: \'Open Sans\', sans-serif;"><span>'
    . $this->faker->paragraph
    . '</span></p>'
    . '<p style="font-family: \'Open Sans\', sans-serif;"><span>'
    . $this->faker->paragraph
    . '</span></p>'
    . '<p style="font-family: \'Open Sans\', sans-serif;"><span>'
    . $this->faker->paragraph
    . '</span></p>'
    . '</div>'
    . '</div>',

        'price' => $price,
        'selling_price' => $sellingPrice,
        'is_featured' => $this->faker->randomElement(['0', '1']),
        'sku' => $this->faker->unique()->bothify('SKU-???????'),
        'barcode' => $this->faker->ean13,
        'track_stock' => $this->faker->randomElement(['0', '1']),
        'quantity' => $this->faker->numberBetween(0, 100),
        'status' => $this->faker->randomElement(['0', '1']),
    ];
}

}
