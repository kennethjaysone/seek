<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \HttpOz\Roles\Models\Role::create([
	        'name' => 'Admin',
	        'slug' => 'admin',
	        'description' => 'God mode',
	        'group' => 'default'
    	]);

        \HttpOz\Roles\Models\Role::create([
	        'name' => 'Employer',
	        'slug' => 'employer',
	        'description' => 'An employer who would like to create jobs on our job board',
	        'group' => 'default'
    	]);

        \HttpOz\Roles\Models\Role::create([
            'name' => 'Guest',
            'slug' => 'guest',
            'description' => 'A passer by',
            'group' => 'default'
        ]);

    }
}
