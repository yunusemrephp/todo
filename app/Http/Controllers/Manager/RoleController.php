<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Services\ManagerRoleService;
use App\Services\ManagerUserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * manager role
     */
    public function role()
    {
        try {
            $managerData = (new ManagerRoleService())->findAll();
        } catch (ModelNotFoundException $exception) {
            return view('errors.notfound', ['error' => $exception->getMessage()]);
        }

        $type = 'role';
        $title = "Role Management";

        return view('manager')->with(compact('type', 'managerData', 'title'));
    }

    /**
     * Show detail the role.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $managerData = (new ManagerRoleService())->findPermissions($id);

        $type = 'roleDetail';
        $title = "Role - Detail";

        return view('manager')->with(compact('type', 'managerData', 'title'));
    }

}
