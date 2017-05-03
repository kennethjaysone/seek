<?php

namespace Tests\Unit;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PuchaseJobListingTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_payment_returns_a_owner()
	{
		$payment = factory('App\Payment')->create();

		$this->assertEquals(1, count($payment->owner));
	}

	protected function createUser($role)
	{
	    // Given there is a role admin
	    $role = factory('HttpOz\Roles\Models\Role')->create(['name' => $role, 'slug' => strtolower($role)]);
	    
	    $user = factory('App\User')->create();

	   	User::find($user['id'])->attachRole($role);

	    return $user;
	}
}
