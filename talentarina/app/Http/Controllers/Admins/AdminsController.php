<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //

    public function Index()
    {
        return view('admin.view-login');
    }


    public function Dashboard()
    {
        return view('admin.index');
    }


    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
           
            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    }

}

