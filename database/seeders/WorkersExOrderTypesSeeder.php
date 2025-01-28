<?php

namespace Database\Seeders;

use App\Models\OrderType;
use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkersExOrderTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workers = Worker::all();
        $orderTypes = OrderType::all();

        $workers->each(function ($worker) use ($orderTypes) {
            $orderType = $orderTypes->random();

            $worker->excludedOrderTypes()->attach($orderType->id);
        });
    }
}
