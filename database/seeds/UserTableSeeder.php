<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_Student = Role::where('name', 'student')->first();
        $role_Admin = Role::where('name', 'admin')->first();        
        
        $user = new User();
        $user->name = 'andres admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('123456');
        $user->codUserRol = '1';
        $user->save();
        //$user->roles()->attach($role_Admin);

        $user = new User();
        $user->name = 'Andres Ayala';
        $user->state = 'Activo';
        $user->email = 'andres@mail.com';
        $user->password = bcrypt('123456');
        $user->codUserRol = '2';
        $user->save();
        //$user->roles()->attach($role_Student);        
        $user = new User();
        $user->name = 'Nelcy Ayala';
        $user->state = 'Activo';
        $user->email = 'nelcy@mail.com';
        $user->password = bcrypt('123456');
        $user->codUserRol = '3';
        $user->save();
    }
}
