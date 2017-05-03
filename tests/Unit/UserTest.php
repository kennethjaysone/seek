<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_user_has_many_employer_profiles()
	{
	    $user = createUser('Employer');

	    $employer = factory('App\Employer')->create(['user_id' => $user->id]);

	    $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->employers);
	}
}
