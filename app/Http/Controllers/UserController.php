<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('pages.dashboard.user.index', compact('users'));
    }

    public function create_suplier()
    {
        return view('pages.dashboard.user.suplier.index');
    }
}
