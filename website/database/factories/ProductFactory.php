<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * List of real wine names
     */
    protected static array $wineNames = [
        // Red wines
        'Cabernet Sauvignon Reserve',
        'Merlot Grand Cru',
        'Pinot Noir Premium',
        'Shiraz Selection',
        'Malbec Argentina',
        'Tempranillo Rioja',
        'Sangiovese Toscana',
        'Zinfandel California',
        'Grenache Rhône Valley',
        'Nebbiolo Barolo',
        'Bordeaux Château Margaux',
        'Bordeaux Saint-Émilion',
        'Châteauneuf-du-Pape',
        'Côtes du Rhône',
        'Chianti Classico',
        // White wines
        'Chardonnay Napa Valley',
        'Sauvignon Blanc Loire',
        'Riesling Alsace',
        'Pinot Grigio Veneto',
        'Moscato d\'Asti',
        'Gewurztraminer',
        'Viognier',
        'Albariño Galicia',
        'Sémillon Bordeaux',
        'Chenin Blanc South Africa',
        // Rosé wines
        'Rosé de Provence',
        'White Zinfandel',
        'Garnacha Rosado',
        // Champagne & Sparkling
        'Champagne Brut',
        'Prosecco Extra Dry',
        'Cava Reserva',
        'Crémant de Bourgogne',
        // Sweet wines
        'Sauternes Château d\'Yquem',
        'Ice Wine Riesling',
        'Port Ruby',
        'Port Tawny 10 Years',
        'Sherry Pedro Ximénez',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->randomElement(static::$wineNames) . ' ' . $this->faker->year();
        $price = $this->faker->randomFloat(0, 200000, 5000000);

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1,
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->randomNumber(5),
            'barcode' => $this->faker->ean13(),
            'description' => $this->faker->paragraphs(3, true),
            'quantity' => $this->faker->numberBetween(0, 100),
            'price' => $price,
            'discount_percent' => $this->faker->randomElement([0, 0, 0, 5, 10, 15, 20, 25, 30]),
            'viewer' => $this->faker->numberBetween(0, 10000),
            'rating_number' => $this->faker->numberBetween(0, 500),
            'rating_value' => $this->faker->randomFloat(1, 3.5, 5.0),
            'brand_id' => Brand::inRandomOrder()->first()?->id ?? 1,
            'post_id' => null,
        ];
    }
}
