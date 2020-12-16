<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function Permission()
    {
        $dev_permission = Permission::where('slug','create-todos')->first();
        $manager_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'Standard User';
        $user_role->save();
        $user_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug = 'manager';
        $manager_role->name = 'Manager';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);

        $user_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();

        $createTodos = new Permission();
        $createTodos->slug = 'create-todos';
        $createTodos->name = 'Create Todos';
        $createTodos->save();
        $createTodos->roles()->attach($user_role);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);

        $user_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $user_perm = Permission::where('slug','create-tasks')->first();
        $manager_perm = Permission::where('slug','edit-users')->first();

        //$developer = new User();
        //$developer->name = 'Mahedi Hasan';
        //$developer->email = 'mahedi@gmail.com';
        //$developer->password = bcrypt('secrettt');
        //$developer->save();
        //$developer->roles()->attach($user_role);
        //$developer->permissions()->attach($user_perm);


        $manager = new User();
        $manager->name = 'Manager';
        $manager->email = 'adminx@yunusemre.me';
        $manager->password = bcrypt('Kralemre123/*');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);

        return redirect()->back();
    }
}
