<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create(['name' => 'beef', 'unit' => 'kg', 'quantity' => 20, 'main_quantity' => 20]);
        Stock::create(['name' => 'cheese', 'unit' => 'kg', 'quantity' => 5, 'main_quantity' => 5]);
        Stock::create(['name' => 'onion', 'unit' => 'kg', 'quantity' => 1, 'main_quantity' => 1]);
        Stock::create(['name' => 'tomato', 'unit' => 'kg', 'quantity' => 10, 'main_quantity' => 10]);
    }
}
