<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JobsTableSeeder::class);
        $this->call(UserRolesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(DealTypesTableSeeder::class);
        $this->call(DealsTableSeeder::class);
    }
}
