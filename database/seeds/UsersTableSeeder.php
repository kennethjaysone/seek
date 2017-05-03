<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $guestRole = \HttpOz\Roles\Models\Role::whereSlug('guest')->first();

        $users = factory('App\User', 50)->create();

        foreach ($users as $user) {
            $user = User::find($user->id);
            $user->attachRole($guestRole);
        }
        
        $adminRole = \HttpOz\Roles\Models\Role::whereSlug('admin')->first();

        $userKenneth = User::create([
            'name' => 'Kenneth Jaysone Francis',
            'email' => 'kennethjaysone@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $userKenneth->attachRole($adminRole);

        $userSeek = User::create([
        	'name' => 'Seek Asia',
            'email' => 'user@seek.com',
            'password' => bcrypt('password'),
        ]);

        $userSeek->attachRole($adminRole);

        $userGuest = User::create([
            'name' => 'A guest user',
            'email' => 'user@guest.com',
            'password' => bcrypt('password'),
        ]);

        $userGuest->attachRole($guestRole);
    }
}
