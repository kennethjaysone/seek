<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DealsTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_model_factory_can_create_a_deal_type()
	{
	    $dealType = factory('App\DealType')->create(['name' => 'Sample', 'description' => 'more than a sample']);

	    $this->assertEquals('Sample', $dealType->name);
	    $this->assertEquals('more than a sample', $dealType->description);
	}

	/** @test */
	function a_model_factory_can_create_a_deal()
	{

		$dealType = factory('App\DealType')->create();

		$dealInfo = [
			'deal_type_id' => $dealType->id,
			'name' => 'A deal name',
			'description' => 'A deal description',
			'min' => 1,
			'max' => 10,
			'price' => 15000
		];

	    $deal = factory('App\Deal')->create($dealInfo);

	    $this->assertEquals('A deal name', $deal->name);
	    $this->assertEquals('A deal description', $deal->description);
	    $this->assertEquals(1, $deal->min);
	    $this->assertEquals(10, $deal->max);
	    $this->assertEquals(15000, $deal->price);

	}

	/** @test */
	function an_admin_can_access_the_deals_page()
	{

		$admin = createUser('Admin');

	    $this->actingAs($admin)->get('admin/deals')
	    	->assertStatus(200);
	}

	/** @test */
	function an_admin_can_create_a_deal()
	{
	    $admin = createUser('Admin');

	    $deal = factory('App\Deal')->make();

	    $this->actingAs($admin)->post('admin/deals', $deal->toArray());

	    $this->actingAs($admin)->get('admin/deals')
	    	->assertStatus(200)
	    	->assertSee($deal->name)
	    	->assertSee($deal->description)
	    	->assertSee($deal->formatted_price);
	}

	

	/** @test */
	function an_admin_can_update_a_deal()
	{
	    $admin = createUser('Admin');

	    $deal = factory('App\Deal')->create();

	    $this->actingAs($admin)->put('admin/deals/' . $deal->id, ['name' => 'A new deal name']);

	    $this->actingAs($admin)->get('admin/deals/' . $deal->id)
	    	->assertSee('A new deal name');
	}

	/** @test */
	function an_employer_can_see_deals_associated_with_them()
	{
		$user = createUser('Employer');

	    $employer = factory('App\Employer')->create(['user_id' => $user->id]);

	    $deal = factory('App\Deal')->create();

	    $employer->deals()->attach([$deal->id]);

	    $this->actingAs($user)->get('home/employer/deals')
	    	->assertSee($deal->name);
	}

}
