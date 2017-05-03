<?php

use App\User;

	function createUser($role)
	{
	    // Given there is a role admin
	    $role = factory('HttpOz\Roles\Models\Role')->create(['name' => $role, 'slug' => strtolower($role)]);
	    
	    $user = factory('App\User')->create();

	   	User::find($user['id'])->attachRole($role);

	    return $user;
	}