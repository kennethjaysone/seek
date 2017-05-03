<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
    	
    	$users = User::paginate(10);

    	return view('users.index', compact('users'));

    }

    public function show(User $user)
    {
    	return view('admins.users.show', compact('user'));
    }

    public function updateRole(User $user)
    {

        if ($user->hasRole('guest')) 
        {
            $user->detachAllRoles();
            $employerRole = \HttpOz\Roles\Models\Role::whereSlug('employer')->first();
            $user->attachRole($employerRole);
        }

        return redirect()->back();

    }
}
