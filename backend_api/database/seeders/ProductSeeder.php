<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name' => 'Chicken Burger', 'description' => 'Chicken', 'image' => 'https://natashaskitchen.com/wp-content/uploads/2019/04/Best-Burger-5.jpg']);
        Product::create(['name' => 'Veg Burger', 'description' => 'Veg', 'image' => 'https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YmVlZiUyMGJ1cmdlcnxlbnwwfHwwfHw%3D&w=1000&q=80']);
        Product::create(['name' => 'Crunchy Burger', 'description' => 'Crunchy', 'image' => 'https://assets.cntraveller.in/photos/60ba26c0bfe773a828a47146/4:3/w_1440,h_1080,c_limit/Burgers-Mumbai-Delivery.jpg']);
        Product::create(['name' => 'Spicy Burger', 'description' => 'Spicy', 'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVlZiUyMGJ1cmdlcnxlbnwwfHwwfHw%3D&w=1000&q=80']);
        Product::create(['name' => 'Meet Burger', 'description' => 'Meet', 'image' => 'https://www.simplyrecipes.com/thmb/gazZFx2d2vq4lq1JE-Hv2jUqRR4=/3900x2600/filters:fill(auto,1)/Simply-Recipes-Mushroom-Swiss-Burger-LEAD-10-e86ce22657bb4a11b5d4b3f4d1230fe3.jpg']);
    }
}
