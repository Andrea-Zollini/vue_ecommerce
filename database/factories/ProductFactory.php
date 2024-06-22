<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'id' => Ulid::generate(),
            'name' => $name = $this->faker->words(3, true),
            'slug' => preg_replace('/\s+/', '-', $name),
            'description' => $this->faker->realText(200),
            'price' => $this->faker->randomFloat(2, 1, 10),
            'weight' => $this->faker->numberBetween(0, 100),
            'quantity' => $this->faker->numberBetween(0, 50),
            'image' => "https://picsum.photos/600/200/",
            'category_id' => Category::factory(),
        ];
    }
}
