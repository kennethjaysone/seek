<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployerTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function an_employer_belongs_to_a_user()
	{
	    $employer = factory('App\Employer')->create();

	    $this->assertInstanceOf('App\User', $employer->user);
	}

	/** @test */
	function an_employer_has_many_deals()
	{
	    $employer = factory('App\Employer')->create();

	    $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $employer->deals);
	}

	
}
