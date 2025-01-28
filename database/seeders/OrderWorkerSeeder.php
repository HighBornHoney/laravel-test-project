<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $workers = Worker::all();

        $orders->each(function ($order) use ($workers) {
            $workersToAssign = $workers->random(rand(1, 3));

            $workersToAssign->each(function ($worker) use ($order) {
                $order->workers()->attach($worker->id, ['amount' => rand(300, 700)]);
            });
        });
    }
}
