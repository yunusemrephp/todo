<?php
namespace App\Services;

use App\Models\Role;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ManagerRoleService
{
    public function findById($id)
    {
        $roleData = Role::findOrFail($id);
        return $roleData;
    }

    public function findPermissions($id)
    {
        $permissionData = Role::findOrFail($id)->permissions;
        return $permissionData;
    }

    public function findByName($name)
    {
        $roleData = Role::where('name', 'like', '%'.$name.'%')->get();
        if(count($roleData) < 1) {
            throw new ModelNotFoundException("User not found.");
        }
        return $roleData;
    }

    public function findAll()
    {
        $roleData = Role::all();
        return $roleData;
    }
}
