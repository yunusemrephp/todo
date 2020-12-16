<?php

namespace App\Http\Controllers\Manager;

use App\Exceptions\SearchNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Services\ManagerUserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class ManagerController extends Controller
{
    /**
     * For auth&roles middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:manager');
        $this->middleware('check.alert');
    }

    /**
     * manager dashboard
     */
    public function dashboard()
    {
        $managerData = (object) [
            ['name' => "User Management", 'url' => 'users.show'],
            ['name' => "Role&Permissions", 'url' => 'role'],
            ['name' => "Analytic", 'url' => 'analytic']
        ];

        $type = 'dashboard';
        $title = "Manager Dashboard";

        return view('manager')->with(compact('type', 'managerData', 'title'));
    }


}
