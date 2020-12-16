<?php
namespace App\Services;

use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ManagerUserService
{
    public function findById($id)
    {
        $userData = User::findOrFail($id);
        return $userData;
    }

    public function findByName($name)
    {
        $usersData = User::where('name', 'like', '%'.$name.'%')->get();
        if(count($usersData) < 1){
            throw new ModelNotFoundException("User not found.");
        }
        return $usersData;
    }

    public function findAll()
    {
        $usersData = User::all();
        return $usersData;
    }
}
