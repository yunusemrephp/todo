<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WebController extends Controller
{
    public function show()
    {
        return Inertia::render('Welcome', [
            'data' => $usersData = User::all()
        ]);
    }
}
