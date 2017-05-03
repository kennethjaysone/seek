<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobPackagesTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_signed_in_user_can_view_job_packages()
	{
	    $packages = factory('App\Package')->create(['price' => 2340]);

	    $this->actingAs($user = createUser('Guest'))
	    	->get('home/packages')
	    	->assertStatus(200)
	    	->assertSee($packages->name)
	    	->assertSee($packages->description)
	    	->assertSee('23.40');
	}

	/** @test */
	function a_signed_in_user_can_view_individual_job_package()
	{
	    $packages = factory('App\Package')->create(['name' => 'Premium', 'price' => 2340]);

	    $this->actingAs($user = createUser('Guest'))
	    	->get('home/packages/' . $packages->id)
	    	->assertStatus(200)
	    	->assertSee('Premium')
	    	->assertSee('23.40');
	}

}
