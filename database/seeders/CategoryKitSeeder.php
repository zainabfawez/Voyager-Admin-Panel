<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryKitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_kit')->insert([
            'kit_id' => 1,
            'category_id' => 1,
            
        ]);

        DB::table('category_kit')->insert([
            'kit_id' => 1,
            'category_id' => 2,
            
        ]);

        DB::table('category_kit')->insert([
            'kit_id' => 1,
            'category_id' => 3,
            
        ]);

        DB::table('category_kit')->insert([
            'kit_id' => 12,
            'category_id' => 14,
            
        ]);

        DB::table('category_kit')->insert([
            'kit_id' => 11,
            'category_id' => 14,
            
        ]);

        DB::table('category_kit')->insert([
            'kit_id' => 20,
            'category_id' => 15,
            
        ]);

        DB::table('category_kit')->insert([
            'kit_id' => 10,
            'category_id' => 25,
            
        ]);
    }
}
