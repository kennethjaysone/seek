<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase
{

	use DatabaseMigrations;

	/** @test */
	function only_a_user_with_admin_role_can_access_dashboard()
	{

		$adminRole = factory('HttpOz\Roles\Models\Role')->create(['name' => 'Admin', 'slug' => 'admin']);

		$user = factory('App\User')->create();

		User::find($user->id)->attachRole($adminRole);

	    $this->assertTrue($user->hasRole('admin'));

	    $this->actingAs($user)->get('/admin')
	    	->assertSee('Welcome Admin!')
	    	->assertStatus(200);
	}

	/** @test */
	function a_non_admin_user_cannot_access_the_dashboard()
	{
	    $user = createUser('Guest');

	    $this->setExpectedException('HttpOz\Roles\Exceptions\RoleDeniedException');

	    $this->actingAs($user)->get('admin');
	}

	/** @test */
	function a_non_admin_user_is_redirected_to_homepage_when_accessing_admin()
	{
	    $user = createUser('Guest');

	    $this->withExceptionHandling()->actingAs($user)->get('admin')
	    	->assertRedirect('/');

	    $employer = createUser('Employer');

	    $this->withExceptionHandling()->actingAs($employer)->get('admin')
	    	->assertRedirect('/');

	}

	/** @test */
	function an_admin_can_view_all_users()
	{
	    $user = createUser('Guest');

	    $admin = createUser('Admin');

	    $this->actingAs($admin)->get('admin/users')
	    	->assertStatus(200)
	    	->assertSee($user->name)
	    	->assertSee($user->email);
	}

	/** @test */
	function an_admin_can_view_an_individual_user()
	{
	    $user = createUser('Guest');

	    $admin = createUser('Admin');

	    $this->actingAs($admin)->get('admin/users/' . $user->id)
	    	->assertStatus(200)
	    	->assertSee($user->name)
	    	->assertSee($user->email);
	}

	/** @test */
	function an_admin_can_change_a_users_role_to_employer()
	{

		$employerRole = factory('HttpOz\Roles\Models\Role')->create(['name' => 'Employer', 'slug' => 'employer']);

	    $user = createUser('Guest');

	    $admin = createUser('Admin');

	    $this->actingAs($admin)->put('admin/users/' . $user->id . '/role');

	    $this->assertTrue($user->hasRole('employer'));
	}

}
