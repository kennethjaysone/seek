<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
        	[
	        	'name' => 'Classic',
	        	'description' => 'Offers the most basic level of advertisement',
	        	'price' => 26999
        	],
        	[
	        	'name' => 'Standout',
	        	'description' => 'Allows advertisers to use a company logo and use a longer presentation text',
	        	'price' => 32299
        	],
        	[
	        	'name' => 'Premium',
	        	'description' => 'Same benefits as Standout Ad, but also puts the advertisement at the top of the results, allowing higher visibility',
	        	'price' => 39499
        	]
        ];

        foreach ($packages as $package) {
        	factory('App\Package')->create($package);
        }
    }
}
