<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Generics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    //
    use Generics;

    public function register()
    {
        return view('/register');
    }
    public function do_register(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $table = 'users';
        $column = 'user_id';
        $user_id = $this->createUniqueID($table, $column);

        User::create([
            'user_id' => $user_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('done', "Registration was Successfull");
    }
}
