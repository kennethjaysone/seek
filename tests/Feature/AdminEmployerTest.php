<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminEmployerTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function an_admin_can_browse_all_employers()
	{
	    // Given there is a role admin
		$user = createUser('Admin');

	   	$employer = factory('App\Employer')->create();

	   	$this->actingAs($user)->get('admin/employers')
	   		->assertStatus(200)
	   		->assertSee($employer->name)
	   		->assertSee($employer->description);
	}

	/** @test */
	function an_admin_can_assign_a_deal_to_an_employer()
	{
	    $admin = createUser('Admin');
	    $employer = factory('App\Employer')->create();

	    $deal = factory('App\Deal')->create();

	    $this->actingAs($admin)->post('admin/employers/deals/', ['employer_id' => $employer->id, 'deal_id' => $deal->id]);

	    $this->assertCount(1, $employer->deals);
	}

}
