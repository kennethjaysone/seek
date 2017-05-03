<?php

use Illuminate\Database\Seeder;

use App\Deal;

class DealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deals = [
        	[
        		'deal_type_id' => 2,
        		'package_id' => 1,
        		'name' => 'Unilever 3 for 2 deal on Classic Ads',
        		'description' => '3 for 2 deal on Classic Ads',
        		'min' => 2,
        		'max' => 3,
        		'price' => 53998
        	],
        	[
        		'deal_type_id' => 1,
        		'package_id' => 2,
        		'name' => 'Apple Standout Ad',
        		'description' => 'Standout Ads where the price drops to $299.99 per ad',
        		'min' => 1,
        		'max' => 1,
        		'price' => 29999
        	],
        	[
        		'deal_type_id' => 3,
        		'package_id' => 3,
        		'name' => 'Nike Premium Ads for 4 or more',
        		'description' => 'Premium Ads for 4 or more at RM 379.99 per ad',
        		'min' => 4,
        		'max' => 10,
        		'price' => 151996
        	],
        	[
        		'deal_type_id' => 2,
        		'package_id' => 1,
        		'name' => 'Ford 5 for 4 deal on Classic Ads',
        		'description' => '5 for 4 deal on Classic Ads',
        		'min' => 4,
        		'max' => 5,
        		'price' => 107696
        	],
    		[
        		'deal_type_id' => 3,
        		'package_id' => 2,
        		'name' => 'Ford Standout Ads where the price drops for RM 309.99',
        		'description' => 'Standout Ads where the price drops for RM 309.99',
        		'min' => 1,
        		'max' => 1,
        		'price' => 30999
        	],
    		[
        		'deal_type_id' => 3,
        		'package_id' => 2,
        		'name' => 'Ford Standout Ads where the price drops for RM 309.99',
        		'description' => 'Standout Ads where the price drops for RM 309.99',
        		'min' => 1,
        		'max' => 1,
        		'price' => 30999
        	],
        ];

        foreach ($deals as $deal) {
        	Deal::create($deal);
        }
    }
}