<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DealsTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_deal_has_a_deal_type()
	{
	    $deal = factory('App\Deal')->create();

	    $this->assertInstanceOf('App\DealType', $deal->type);
	}

	/** @test */
	function a_deal_has_many_employers()
	{
		$deal = factory('App\Deal')->create();

		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $deal->employers);
	}

	/** @test */
	function a_deal_has_a_package_type()
	{
	    $deal = factory('App\Deal')->create();

	    $this->assertInstanceOf('App\Package', $deal->package);
	}

}
