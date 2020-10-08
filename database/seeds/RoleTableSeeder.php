<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->id = '1';
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->id = '2';
        $role->name = 'student';
        $role->description = 'User student';
        $role->save();

        $role = new Role();
        $role->id = '3';
        $role->name = 'employer';
        $role->description = 'User employer';
        $role->save();
    }
}
