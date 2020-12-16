<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Services\ManagerUserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * manager user
     */
    public function user()
    {
        try {
            $managerData = (new ManagerUserService())->findAll();
        } catch (ModelNotFoundException $exception) {
            return view('errors.notfound', ['error' => $exception->getMessage()]);
        }

        $type = 'user';
        $title = "User Management";

        return view('manager')->with(compact('type', 'managerData', 'title'));
    }


    /**
     * Show detail the users.
     *
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $managerData = (new ManagerUserService())->findById($id);

        $type = 'userDetail';
        $title = $managerData->name." - Detail";

        return view('manager')->with(compact('type', 'managerData', 'title'));
    }


    /**
     * search user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        try {
            $managerData = (new ManagerUserService())->findByName($request->search);
        } catch (ModelNotFoundException $exception) {
            return view('errors.notfound', ['error' => $exception->getMessage()]);
        }

        $type = 'user';
        $title = "User Management - Search: ".$request->search;

        return view('manager')->with(compact('type', 'managerData', 'title'));
    }


}
