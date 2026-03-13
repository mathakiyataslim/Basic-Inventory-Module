<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        Products::factory(10)->create();
        // Products::factory(10)->create();
        //  $this->call([
        //     categorysSeeder::class,
        //  ]);
         

    
    }
}
