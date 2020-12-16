<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $finishCount = User::find(Auth::user()->id)->todoList()->where('status', '1')->count();
        $unfinishCount = User::find(Auth::user()->id)->todoList()->where('status', '5')->count();

        $countArr = (object) array('finishCount' => $finishCount, 'unfinishCount' => $unfinishCount);

        var_dump(getenv('ENV_VAR_NAME'));

        return view('index', compact('countArr'));
    }
}
