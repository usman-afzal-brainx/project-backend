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
        request()->validate([
            'f_name' => 'required',
            'cnic' => 'required',
            'address' => 'required',
            'dp' => 'required',
        ]);
        $user = Auth::user();
        $user->father_name = request('f_name');
        $user->cnic = request('cnic');
        $user->address = request('address');
        $url = Storage::putFile('public/images', request('dp'), 'public');
        $user->dp_url = str_replace('public', 'storage', $url);
        $user->save();
        return redirect('/user');
    }
}
