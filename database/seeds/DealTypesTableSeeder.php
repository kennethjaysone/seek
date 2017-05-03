<?php

use Illuminate\Database\Seeder;

use App\DealType;

class DealTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dealTypes = [
        	[
        		'name' => 'Discounted',
        		'description' => 'A discounted rate for a particular listing package'
        	],
        	[
        		'name' => 'More for less',
        		'description' => 'Get more listings for the price of less. E.g 3 for 2'
        	],
        	[
        		'name' => 'Bulk Discount',
        		'description' => 'Get discounted rates on a particular listing type when you purchase a minimum amount'
        	]
        ];

        foreach ($dealTypes as $deal) {
        	DealType::create($deal);
        }
    }
}
