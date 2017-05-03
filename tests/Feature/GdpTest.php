<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GdpTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function purchase_results_unilever()
	{
	    

	    $deal1 = factory('App\Deal')->create(['name' => '3 for 2', 'price' => 53998, 'min' => 2, 'max' => 3]);

	    $package1 = factory('App\Package')->create(['name' => 'Premium', 'price' => 39499]);

	    $this->assertEquals('934.97', $package1->formatted_price + $deal1->formatted_price); //By default package prices give you 1 ad slot

	    $this->assertEquals(4, $deal1->max + 1); // number of ads

	}

	/** @test */
	function purchase_results_apple()
	{
	    

	    $standout1 = factory('App\Deal')->create(['name' => 'Standout', 'price' => 29999, 'min' => 1, 'max' => 1]);
	    $standout2 = factory('App\Deal')->create(['name' => 'Standout', 'price' => 29999, 'min' => 1, 'max' => 1]);
	    $standout3 = factory('App\Deal')->create(['name' => 'Standout', 'price' => 29999, 'min' => 1, 'max' => 1]);

	    $package1 = factory('App\Package')->create(['name' => 'Premium', 'price' => 39499]);//By default package prices give you 1 ad slot

	    $this->assertEquals('1294.96', $standout1->formatted_price + $standout2->formatted_price + $standout3->formatted_price + $package1->formatted_price);

	    $this->assertEquals(4, $standout1->max + $standout2->max + $standout3->max + 1); // number of ads

	}

	/** @test */
	function purchase_results_nike()
	{
	    

	    $premium = factory('App\Deal')->create(['name' => 'Premium', 'price' => 151996, 'min' => 4, 'max' => 4]);


	    $this->assertEquals('1519.96', $premium->formatted_price);

	    $this->assertEquals(4, $premium->max); // number of ads

	}
}
