<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')-> insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt ('admin')
        ]);

        for($i =0; $i <10; $i++){
            DB::table ('users')->insert ([
                'name' => 'user' .$i,
                'email' => 'admin'.$i.'@gmail.com',
                'password' => bcrypt ('admin')   
            ]);
        }
        
        $this->call([
            CategorySeeder::class,
            RecipeSeeder::class,
            StepSeeder::class,
            IngredientSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
