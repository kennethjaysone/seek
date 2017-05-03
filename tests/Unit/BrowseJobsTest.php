<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BrowseJobsTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_belongs_to_a_category()
	{
	    $job = factory('App\Job')->create();

	    $this->assertInstanceOf('App\Category', $job->category);
	}

}
