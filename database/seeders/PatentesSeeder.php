<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Patentes::factory()->count(15)->create();
    }
}
