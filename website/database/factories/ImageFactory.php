<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * List of wine bottle placeholder images - using reliable placeholder services
     */
    protected static array $wineImages = [
        'https://placehold.co/400x600/8B0000/FFFFFF?text=Red+Wine',
        'https://placehold.co/400x600/FFD700/000000?text=White+Wine',
        'https://placehold.co/400x600/FFB6C1/000000?text=Rose+Wine',
        'https://placehold.co/400x600/F5DEB3/000000?text=Champagne',
        'https://placehold.co/400x600/722F37/FFFFFF?text=Bordeaux',
        'https://placehold.co/400x600/4A0E0E/FFFFFF?text=Cabernet',
        'https://placehold.co/400x600/800020/FFFFFF?text=Merlot',
        'https://placehold.co/400x600/C71585/FFFFFF?text=Pinot+Noir',
        'https://placehold.co/400x600/FFFACD/000000?text=Chardonnay',
        'https://placehold.co/400x600/98FB98/000000?text=Sauvignon',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePath = $this->faker->randomElement(static::$wineImages);

        return [
            'model_type' => Product::class,
            'model_id' => Product::inRandomOrder()->first()?->id ?? 1,
            'path' => $imagePath,
            'name' => 'wine-image-' . $this->faker->unique()->randomNumber(5) . '.jpg',
            'alt' => $this->faker->randomElement([
                'Red wine bottle',
                'White wine bottle',
                'Rosé wine bottle',
                'Champagne bottle',
                'Bordeaux wine',
                'Premium wine',
                'Imported wine',
            ]),
        ];
    }

    /**
     * Create image for a specific product
     */
    public function forProduct(Product $product): static
    {
        return $this->state(fn (array $attributes) => [
            'model_type' => Product::class,
            'model_id' => $product->id,
        ]);
    }
}
