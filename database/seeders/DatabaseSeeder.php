<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TransportadoraSeeder; 
use Database\Seeders\EntregaSeeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TransportadoraSeeder::class,
            EntregaSeeder::class,
        ]);
    }
}
