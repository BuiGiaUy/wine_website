<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * List of wine categories
     */
    protected static array $wineCategories = [
        ['name' => 'Red Wine', 'slug' => 'red-wine'],
        ['name' => 'White Wine', 'slug' => 'white-wine'],
        ['name' => 'Rosé Wine', 'slug' => 'rose-wine'],
        ['name' => 'Champagne', 'slug' => 'champagne'],
        ['name' => 'Sparkling Wine', 'slug' => 'sparkling-wine'],
        ['name' => 'Sweet Wine', 'slug' => 'sweet-wine'],
        ['name' => 'Port Wine', 'slug' => 'port-wine'],
        ['name' => 'Sherry', 'slug' => 'sherry'],
    ];

    protected static int $categoryIndex = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get category in order, if exhausted then random
        if (static::$categoryIndex < count(static::$wineCategories)) {
            $category = static::$wineCategories[static::$categoryIndex];
            static::$categoryIndex++;
        } else {
            $category = $this->faker->randomElement(static::$wineCategories);
        }

        return [
            'name' => $category['name'],
            'slug' => $category['slug'] . '-' . $this->faker->unique()->randomNumber(4),
            'icon_path' => null,
            'parent_id' => null,
            'model_type' => Product::class,
        ];
    }

    /**
     * Reset index to create categories from beginning
     */
    public static function resetIndex(): void
    {
        static::$categoryIndex = 0;
    }
}
