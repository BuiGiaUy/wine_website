<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $price = $product?->price ?? $this->faker->randomFloat(0, 200000, 5000000);

        return [
            'product_id' => $product?->id ?? 1,
            'order_id' => Order::inRandomOrder()->first()?->id ?? 1,
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $price,
            'discount' => $this->faker->randomElement([0, 0, 0, 5, 10, 15, 20]),
        ];
    }

    /**
     * Create order item for a specific order
     */
    public function forOrder(Order $order): static
    {
        return $this->state(fn (array $attributes) => [
            'order_id' => $order->id,
        ]);
    }

    /**
     * Create order item with a specific product
     */
    public function forProduct(Product $product): static
    {
        return $this->state(fn (array $attributes) => [
            'product_id' => $product->id,
            'price' => $product->price,
        ]);
    }
}
