<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Exceptions\ProfileNotFoundException;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * For auth middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.alert');
    }

    /**
     * Show detail the todo.
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        try {
            $profileData = (new ProfileService())->findByAuth();
        } catch (ProfileNotFoundException $exception) {
            return view('errors.404', ['error' => $exception->getMessage(), 'code' => $exception->getCode()]);
        }

        $title = $profileData->name." - Profile";

        return view('auth.profile')->with(compact('profileData', 'title'));
    }

}
