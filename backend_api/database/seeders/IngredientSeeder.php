<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create(['stock_id' => 1, 'product_id' => 1, 'quantity' => 0.02]);
        Ingredient::create(['stock_id' => 2, 'product_id' => 1, 'quantity' => 0.03]);
        Ingredient::create(['stock_id' => 3, 'product_id' => 1, 'quantity' => 0.02]);
        Ingredient::create(['stock_id' => 1, 'product_id' => 2, 'quantity' => 0.02]);
        Ingredient::create(['stock_id' => 2, 'product_id' => 2, 'quantity' => 0.02]);
        Ingredient::create(['stock_id' => 1, 'product_id' => 3, 'quantity' => 0.8]);
        Ingredient::create(['stock_id' => 4, 'product_id' => 3, 'quantity' => 0.1]);
        Ingredient::create(['stock_id' => 1, 'product_id' => 4, 'quantity' => 0.5]);
        Ingredient::create(['stock_id' => 2, 'product_id' => 4, 'quantity' => 0.04]);
        Ingredient::create(['stock_id' => 1, 'product_id' => 5, 'quantity' => 0.2]);
        Ingredient::create(['stock_id' => 3, 'product_id' => 5, 'quantity' => 0.02]);
        Ingredient::create(['stock_id' => 4, 'product_id' => 5, 'quantity' => 0.02]);
    }
}
