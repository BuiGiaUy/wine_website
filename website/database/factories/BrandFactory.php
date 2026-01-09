<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * List of famous wine brands
     */
    protected static array $wineBrands = [
        ['name' => 'Château Margaux', 'description' => 'Leading wine producer from Bordeaux, France'],
        ['name' => 'Penfolds', 'description' => 'Premium wine brand from Australia'],
        ['name' => 'Robert Mondavi', 'description' => 'Renowned wine producer from California, USA'],
        ['name' => 'Antinori', 'description' => 'Oldest wine-producing family in Italy'],
        ['name' => 'Moët & Chandon', 'description' => 'World-leading Champagne brand'],
        ['name' => 'Dom Pérignon', 'description' => 'Premium Champagne from Moët Hennessy'],
        ['name' => 'Opus One', 'description' => 'Joint venture between Robert Mondavi and Baron Philippe de Rothschild'],
        ['name' => 'Torres', 'description' => 'Leading wine producer from Spain'],
        ['name' => 'Catena Zapata', 'description' => 'Famous Argentine wine brand'],
        ['name' => 'Cloudy Bay', 'description' => 'Famous Sauvignon Blanc producer from New Zealand'],
        ['name' => 'Yalumba', 'description' => 'Australia\'s oldest family-owned winery'],
        ['name' => 'Louis Jadot', 'description' => 'Prestigious Burgundy wine producer'],
    ];

    protected static int $brandIndex = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get brand in order, if exhausted then random
        if (static::$brandIndex < count(static::$wineBrands)) {
            $brand = static::$wineBrands[static::$brandIndex];
            static::$brandIndex++;
        } else {
            $brand = $this->faker->randomElement(static::$wineBrands);
        }

        return [
            'name' => $brand['name'],
            'slug' => Str::slug($brand['name']),
            'description' => $brand['description'],
        ];
    }

    /**
     * Reset index to create brands from beginning
     */
    public static function resetIndex(): void
    {
        static::$brandIndex = 0;
    }
}
