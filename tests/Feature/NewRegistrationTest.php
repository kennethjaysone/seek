<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewRegistrationTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_user_that_signs_up_gets_a_role_of_guest()
	{

		// Given when there are roles
		$role = factory('HttpOz\Roles\Models\Role')->create(['name' => 'Guest', 'slug' => 'guest']);

		//And a new user registers
	    $user = [
	    	'name' => 'John Doe',
	    	'email' => 'john@example.com',
	    	'password' => 'anicepassword',
	    	'password_confirmation' => 'anicepassword'
	    ];

	    $this->post('/register', $user)
	    	->assertStatus(302);

		$user = User::where('email', 'john@example.com')->get()->first();

		$this->assertTrue(User::find($user['id'])->hasRole('guest'));

	}

}
