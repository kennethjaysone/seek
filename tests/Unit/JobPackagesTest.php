<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobPackagesTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function it_returns_the_package_price_in_a_formatted_manner()
	{
	    $package = factory('App\Package')->create(['price' => 1990]);

	    $this->assertEquals('19.90', $package->formatted_price);
	}
}
