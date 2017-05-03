<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployerTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function a_user_with_a_role_of_employer_can_access_the_employer_profile_creation()
	{
	    $employer = createUser('Employer');

	    $this->assertTrue($employer->hasRole('employer'));

	    $this->actingAs($employer)->get('home/employer/profile/create')
	    	->assertSee('Your Employer Profile');
	}

	/** @test */
	function a_user_with_a_guest_role_cannot_see_employer_profile()
	{
		$this->setExpectedException('HttpOz\Roles\Exceptions\RoleDeniedException');

	    $employer = createUser('Guest');

	    $this->assertTrue($employer->hasRole('guest'));

	    $this->actingAs($employer)->get('home/employer/profile/create');
	}

	/** @test */
	function an_employer_user_can_create_profile()
	{
		$employer = createUser('Employer');

		$profile = factory('App\Employer')->make(['user_id' => $employer->id]);

		$this->actingAs($employer)->post('home/employer/profile', $profile->toArray())
			->assertStatus(302)
			->assertRedirect('/home');

	}

	/** @test */
	function an_employer_is_redirected_to_update_if_profile_is_already_created()
	{
	    $employer = createUser('Employer');

		$profile = factory('App\Employer')->create(['user_id' => $employer->id]);

		$this->actingAs($employer)->get('home/employer/profile/create')
			->assertRedirect('/home/employer/profile/' . $profile->id . '/edit');
	}

	/** @test */
	function an_employer_can_access_edit_a_profile()
	{
	    $employer = createUser('Employer');

	    $profile = factory('App\Employer')->create(['user_id' => $employer->id]);

		$this->actingAs($employer)->get('home/employer/profile/' . $profile->id . '/edit')
			->assertStatus(200)
			->assertSee($profile->name)
			->assertSee($profile->description);

	}

	/** @test */
	function an_employer_cannot_edit_other_employer_profiles()
	{
	    $employer = createUser('Employer');

	    $profile = factory('App\Employer')->create();

	    $this->actingAs($employer)->get('home/employer/profile/' . $profile->id . '/edit')
			->assertStatus(302)
			->assertRedirect('/home');

	}

	/** @test */
	function an_employer_can_update_a_profile()
	{
	    $employer = createUser('Employer');

	    $profile = factory('App\Employer')->create(['user_id' => $employer->id]);

	    $this->actingAs($employer)->put('home/employer/profile/' . $profile->id, ['name' => 'A new name', 'description' => 'A new description', $profile]);

	    $this->actingAs($employer)->get('home/employer/profile/' . $profile->id . '/edit')
	    	->assertSee('A new name')
	    	->assertSee('A new description');
	}

	/** @test */
	function an_employer_requires_a_name()
	{
		$employer = createUser('Employer');
	    $this->withExceptionHandling()->actingAs($employer)->post('/home/employer/profile', [])
	    	->assertSessionHasErrors('name');
	}

	/** @test */
	function an_employer_requires_a_description()
	{
	    $employer = createUser('Employer');
	    $this->withExceptionHandling()->actingAs($employer)->post('/home/employer/profile', [])
	    	->assertSessionHasErrors('description');
	}

	/** @test */
	function an_employer_requires_a_name_and_description_on_update()
	{
	    $employer = createUser('Employer');

	    $profile = factory('App\Employer')->create(['user_id' => $employer->id]);

	    $this->withExceptionHandling()->actingAs($employer)->put('home/employer/profile/' . $profile->id, [])
	    	->assertStatus(302)
	    	->assertSessionHasErrors('name')
	    	->assertSessionHasErrors('description');
	}


}
