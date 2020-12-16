<?php

namespace App\Http\Controllers\Interia\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use App\Http\Requests\UserRequest;

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

    public function show()
    {
        return Inertia::render('Pages/Manager/User', [
            'data' => $usersData = User::all()
        ]);
    }

    public function update(UserRequest $request)
    {
        if ($request->has('id')) {
            User::find($request->input('id'))->update($request->all());
            return redirect()->back()
                ->with(['toast' =>  ['message' => config('todo.post_message.update')]]);
        }
    }

    public function store(CreateUserRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()
        ->with(['toast' =>  ['message' => config('todo.post_message.create')]]);
    }

    public function destroy($id) {

    }

}
