<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Car;
use \App\Models\User;
use \App\Models\Sell;
use \App\Models\Brand;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        User::truncate();
        Brand::truncate();
        Car::truncate();
        Sell::truncate();

         \App\Models\User::factory(2)->create();
         Sell::factory(2)->create();
         Sell::factory(3)->create([
             'user_id'=>User::factory()->create(),
         ]);
         $brand = Brand::factory()->create();
         Car::factory(3)->create([
            'brand_id'=>$brand->id,
        ]);
             


         
         
    }
}
