<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.index', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function update()
    {

        $user = Auth::user();
        $user->father_name = request('f_name');
        $user->cnic = request('cnic');
        $user->address = request('address');
        $url = Storage::put('public', request('dp'));
        $user->dp_url = $url;
        $user->save();
        return redirect('/user');
    }
}
