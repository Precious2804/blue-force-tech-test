<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $data = ['data' => User::paginate(10)];
        return view('admin.dashboard')->with($data);
    }
    public function user_details(Request $request)
    {
        $data = ['data' => User::where('user_id', $request->user)->first()];
        return view('admin.user_details')->with($data);
    }
    public function edit_user(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);
        return back()->with('done', "User was Updated Successfully");
    }
    public function delete_user(Request $request)
    {
        $user = User::where('user_id', $request->user)->first();
        $user->delete();

        return redirect()->route('admin.dashboard')->with('deleted', "User was removed successfully");
    }
    public function all_appointments()
    {
        $data = ['data' => Appointments::paginate(10)];
        return view('admin.all_appointments')->with($data);
    }
    public function appoint_details(Request $request)
    {
        $data = ['data' => Appointments::where('app_id', $request->appoint)->first()];
        return view('admin.appoint_details')->with($data);
    }
    public function approve(Request $request)
    {
        $data = Appointments::where('app_id', $request->app_detail)->first();
        $data->update([
            'status' => "Approved"
        ]);
        return back()->with('approved', "Appointment schedule has been Successfully Approved");
    }
    public function cancel(Request $request)
    {
        $data = Appointments::where('app_id', $request->app_detail)->first();
        $data->update([
            'status' => "Cancelled"
        ]);
        return back()->with('cancel', "Appointment schedule was not approved");
    }
    public function delete(Request $request)
    {
        $data = Appointments::where('app_id', $request->app_detail)->first();
        $data->delete();

        return redirect()->route('all_appointments')->with('deleted', "Appointment was Deleted Succesfully");
    }
}
