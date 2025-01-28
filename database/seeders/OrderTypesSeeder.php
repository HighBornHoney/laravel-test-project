<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_types')->insert([
            ['name' => 'Погрузка/Разгрузка'],
            ['name' => 'Такелажные работы'],
            ['name' => 'Уборка'],
        ]);

        OrderType::factory(25)->create();
    }
}
