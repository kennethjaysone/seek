<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_category_has_a_collection_of_jobs()
	{
	    $category = factory('App\Category')->create();

	    $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $category->jobs);
	}
	
}
