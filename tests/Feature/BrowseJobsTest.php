<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BrowseJobsTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_visitor_can_browse_all_jobs()
	{
	    $job = factory('App\Job')->create();

	    $this->get('jobs')
	    	->assertStatus(200)
	    	->assertSee($job->title)
	    	->assertSee($job->description);

	}

	/** @test */
	function a_visitor_can_view_an_individual_job()
	{
	    $job = factory('App\Job')->create();

	    $this->get('jobs/' . $job->category->slug . '/' . $job->id)
	    	->assertStatus(200)
	    	->assertSee($job->title)
	    	->assertSee($job->description);
	}


	/** @test */
	function a_user_can_filter_jobs_by_category()
	{
		//$this->withExceptionHandling();

		$category = factory('App\Category')->create();

		$jobInCategory = factory('App\Job')->create(['category_id' => $category->id]);

		$jobNotInCategory = factory('App\Job')->create();

		$this->get('jobs/' . $category->slug)
			->assertStatus(200)
			->assertSee($jobInCategory->title)
			->assertDontSee($jobNotInCategory->title);
	    
	}

	



}
