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
        $user->name = 'Andres';
        $user->lastName = 'Ayala';
        $user->email = 'adminAndres@gmail.com';
        $user->password = bcrypt('12345678');
        $user->codUserRol = '1';
        $user->save();

        $user = new User();
        $user->name = 'Adriana';
        $user->lastName = 'Ramirez';
        $user->email = 'arcp25@gmail.com';
        $user->password = bcrypt('12345678');
        $user->codUserRol = '1';
        $user->save();
        //$user->roles()->attach($role_Admin);

        $user = new User();
        $user->name = 'Andres';
        $user->lastName = 'Ayala';
        $user->state = 'Activo';
        $user->email = 'sipuedeshazloya@gmail.com';
        $user->password = bcrypt('12345678');
        $user->codUserRol = '2';
        $user->save();
        //$user->roles()->attach($role_Student);        
        $user = new User();
        $user->name = 'Adriana';
        $user->lastName = 'Ramirez';
        $user->state = 'Activo';
        $user->email = 'arcp25@gmail.com';
        $user->password = bcrypt('12345678');
        $user->codUserRol = '3';
        $user->save();
    }
}
