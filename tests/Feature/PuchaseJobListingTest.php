<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PuchaseJobListingTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_user_can_pay_for_a_listing_package()
	{

		$package = factory('App\Package')->create(['price' => 2000]);

		$user = createUser('Guest');

		$paymentDetails = [
			'user_id' => $user->id,
			'package_id' => $package->id,
			'amount' => $package->price,
			'count' => 1
		];

	    $this->actingAs($user)
	    	->post('home/packages/1/purchase', $paymentDetails)
	    	->assertStatus(302)
	    	->assertRedirect('/home');

    	$this->actingAs($user)->get('/home/payments')
    		->assertSee('20.00');

	}

}
