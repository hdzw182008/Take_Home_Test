<?php

namespace Database\Seeders;

use App\Models\Signa;
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
        // Signa::factory(20)->create();
        User::factory()->create();

       

    }
}
