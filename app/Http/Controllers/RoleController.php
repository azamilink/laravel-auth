<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function addRole()
    {
        $roles = [
            ['name' => 'Administratro'],
            ['name' => 'Editor'],
            ['name' => 'Author'],
            ['name' => 'Contributor'],
            ['name' => 'Subcriber'],
        ];

        Role::insert($roles);
        return "Roles are created successfully";
    }

    public function attachRole($id)
    {
        $user =  User::find($id);
        $roleIds = [1, 2];
        $user->role()->attach($roleIds);
        return "record has been created successfuly";
    }

    public function getAllRoleByUser($id)
    {
        $user = User::find($id);
        $roles = $user->role;
        return $roles;
    }

    public function getAllUserByRole($id)
    {
        $role = Role::find($id);
        $users = $role->user;
        return $users;
    }
}
