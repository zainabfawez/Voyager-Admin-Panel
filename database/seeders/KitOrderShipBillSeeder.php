<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KitOrderShipBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billing_addresses')->insert([
            'address' => "BillingAddress_1", 
        ]);
        DB::table('billing_addresses')->insert([
            'address' => "BillingAddress_2", 
        ]);
        DB::table('billing_addresses')->insert([
            'address' => "BillingAddress_3", 
        ]);
        DB::table('billing_addresses')->insert([
            'address' => "BillingAddress_4", 
        ]);
        DB::table('billing_addresses')->insert([
            'address' => "BillingAddress_5", 
        ]);

        DB::table('shipping_addresses')->insert([
            'address' => "shippingAddress_1", 
        ]);
        DB::table('shipping_addresses')->insert([
            'address' => "shippingAddress_2", 
        ]);
        DB::table('shipping_addresses')->insert([
            'address' => "shippingAddress_3", 
        ]);
        DB::table('shipping_addresses')->insert([
            'address' => "shippingAddress_4", 
        ]);
        DB::table('shipping_addresses')->insert([
            'address' => "shippingAddress_5", 
        ]);

        DB::table('orders')->insert([
            'name' => "order_1", 
            'billing_address_id'=>1,
            'shipping_address_id'=>1,
        ]);
        DB::table('orders')->insert([
            'name' => "order_2", 
            'billing_address_id'=>1,
            'shipping_address_id'=>2,
        ]);
        DB::table('orders')->insert([
            'name' => "order_3", 
            'billing_address_id'=>2,
            'shipping_address_id'=>3,
        ]);
        DB::table('orders')->insert([
            'name' => "order_4", 
            'billing_address_id'=>4,
            'shipping_address_id'=>2,
        ]);
        DB::table('orders')->insert([
            'name' => "order_5", 
            'billing_address_id'=>3,
            'shipping_address_id'=>5,
        ]);
        DB::table('orders')->insert([
            'name' => "order_6", 
            'billing_address_id'=>5,
            'shipping_address_id'=>3,
        ]);
        DB::table('orders')->insert([
            'name' => "order_7", 
            'billing_address_id'=>5,
            'shipping_address_id'=>5,
        ]);
        DB::table('orders')->insert([
            'name' => "order_8", 
            'billing_address_id'=>4,
            'shipping_address_id'=>1,
        ]);
        DB::table('orders')->insert([
            'name' => "order_9", 
            'billing_address_id'=>3,
            'shipping_address_id'=>4,
        ]);
        DB::table('orders')->insert([
            'name' => "order_10", 
            'billing_address_id'=>3,
            'shipping_address_id'=>1,
        ]);

        DB::table('kit_order')->insert([
            'kit_id'=>1,
            'order_id'=>1,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>2,
            'order_id'=>2,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>13,
            'order_id'=>3,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>3,
            'order_id'=>4,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>14,
            'order_id'=>5,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>10,
            'order_id'=>6,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>1,
            'order_id'=>7,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>5,
            'order_id'=>8,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>10,
            'order_id'=>9,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>13,
            'order_id'=>10,
        ]);
        DB::table('kit_order')->insert([
            'kit_id'=>12,
            'order_id'=>1,
        ]);

    }
}
