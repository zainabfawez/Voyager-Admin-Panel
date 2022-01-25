<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MyCategory::factory(25)->create();
    }
}
