<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patentes;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        Patentes::factory()->count(14)->create();
    }
}
