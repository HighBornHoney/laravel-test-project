<?php

namespace Database\Factories;

use App\Models\OrderType;
use App\Models\Partnership;
use App\Models\User;
use App\Models\Worker;
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
        $orderType = OrderType::inRandomOrder()->first();

        $validWorkers = Worker::whereDoesntHave('excludedOrderTypes', function ($query) use ($orderType) {
            $query->where('order_type_id', $orderType->id);
        })->get();

        $worker = $validWorkers->random();

        return [
            'type_id' => $orderType->id,
            'partnership_id' => Partnership::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
            'description' => $this->faker->sentence(),
            'date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'address' => $this->faker->address(),
            'amount' => $this->faker->numberBetween(100, 5000),
            'status' => $this->faker->randomElement(['created', 'assigned', 'completed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
