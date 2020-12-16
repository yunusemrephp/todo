<?php
namespace App\Services;

use App\Exceptions\ProfileNotFoundException;
use App\Models\User;
use Auth;

class ProfileService
{
    public function findByAuth()
    {
        $profileData = User::find(Auth::user()->id);
        if(!$profileData){
            throw new ProfileNotFoundException('Profile is not found', '404');
        }

        return $profileData;
    }
}
