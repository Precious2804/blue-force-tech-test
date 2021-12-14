<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\User;
use App\Traits\Generics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function do_login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $req->email)->first();
        if (User::where('email', $req->email)->exists() == true) {

            $credentials = ['email' => $req->email, 'password' => $req->password];
            if (Auth::validate($credentials) == true) {
                Auth::attempt($credentials, $req->remember_me == 'on' ? true : false);
                if ($user['isAdmin'] == 1) {
                    return redirect()->to(route('admin.dashboard'));
                } else {
                    return redirect()->to(route('book_appointment'));
                }
            } else {
                return redirect()->back()->with('info', 'Incorrect password!, please check your credentials and try again.')->withInput($req->only('loginEmail'));
            }
        } else {
            return redirect()->back()->with('infoEmail', 'Email address does not exist!, please check your credentials and try again.');
        }
    }

    public function book_appointment()
    {
        $user = ['loggedUser' => User::where('user_id', Auth::user()->user_id)->first()];
        return view('/book_appointment')->with($user);
    }
    public function all_appointments()
    {
        $data = ['data'=>Appointments::where('user_id', Auth::user()->user_id)->paginate(5)];
        return view('/all_appointments')->with($data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('out', "Logout was Successfull");
    }

    public function book_now(Request $req)
    {
        $req->validate([
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'details' => 'required',
            'reschedule'=>'required'
        ]);

        Appointments::create([
            'app_id' => $this->createUniqueRand('appointments', 'app_id'),
            'user_id' => Auth::user()->user_id,
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'email' => $req->email,
            'phone' => $req->phone,
            'date' => $req->date,
            'time' => $req->time,
            'details' => $req->details,
            'reschedule' => $req->reschedule,
        ]);

        return back()->with('done', "Your appointment was sent successfully");
    }
}
