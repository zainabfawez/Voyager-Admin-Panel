<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => "item_1",
            'approved' =>0,
            'kit_id'=>1,
            'description'=> json_encode([
                "height"=>10,
                "color"=> "red"
            ])  
        ]);

        DB::table('items')->insert([
            'name' => "item_2",
            'approved' =>0,
            'kit_id'=>11,
            'description'=> json_encode([
                "height"=>11,
                "color"=> "green"
            ])    
        ]);

        DB::table('items')->insert([
            'name' => "item_3",
            'approved' =>0,
            'kit_id'=>13,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);

        DB::table('items')->insert([
            'name' => "item_4",
            'approved' =>0,
            'kit_id'=>17,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);

        DB::table('items')->insert([
            'name' => "item_5",
            'approved' =>0,
            'kit_id'=>15,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);

        DB::table('items')->insert([
            'name' => "item_6",
            'approved' =>0,
            'kit_id'=>16,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);

        DB::table('items')->insert([
            'name' => "item_7",
            'approved' =>0,
            'kit_id'=>20,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_8",
            'approved' =>0,
            'kit_id'=>1,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_9",
            'approved' =>0,
            'kit_id'=>4,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_10",
            'approved' =>0,
            'kit_id'=>5,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_11",
            'approved' =>0,
            'kit_id'=>5,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_12",
            'approved' =>0,
            'kit_id'=>2,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_13",
            'approved' =>0,
            'kit_id'=>13,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_14",
            'approved' =>0,
            'kit_id'=>3,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_15",
            'approved' =>0,
            'kit_id'=>4,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_16",
            'approved' =>0,
            'kit_id'=>1,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_17",
            'approved' =>0,
            'kit_id'=>3,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_18",
            'approved' =>0,
            'kit_id'=>2,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_19",
            'approved' =>0,
            'kit_id'=>1,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
        DB::table('items')->insert([
            'name' => "item_20",
            'approved' =>0,
            'kit_id'=>12,
            'description'=> json_encode([
                "height"=>13,
                "color"=> "blue"
            ]) 
        ]);
    }
}
