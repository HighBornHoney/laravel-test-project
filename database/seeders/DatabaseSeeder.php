<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            OrderTypesSeeder::class,
            WorkerSeeder::class,
            WorkersExOrderTypesSeeder::class,
            PartnershipSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            OrderWorkerSeeder::class,
            SessionSeeder::class,
        ]);
    }
}
