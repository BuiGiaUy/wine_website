<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $total = $this->faker->randomFloat(0, 500000, 10000000);
        $discount = $this->faker->randomElement([0, 0, 0, 50000, 100000, 200000, 500000]);
        $totalAmount = max(0, $total - $discount);

        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? 1,
            'payment_id' => Payment::inRandomOrder()->first()?->id ?? null,
            'total' => $total,
            'discount' => $discount,
            'total_amount' => $totalAmount,
        ];
    }

    /**
     * Create order for a specific user
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $user->id,
        ]);
    }
}
