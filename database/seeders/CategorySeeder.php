<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        for($i =0; $i <10; $i++){
            Category::create([
                'name' => $faker->unique()->monthName,
            ]);
        }
    }
}
