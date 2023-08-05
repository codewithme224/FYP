<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;


class EmployersController extends Controller
{
    //

    public function Index() {
        return view("employers.employer_login");
    }
    public function Dashboard() {
        return view("employers.index");
    }


    public function Login(Request $request) {
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('employer')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('employer.dashboard')->with('error', 'You Have Successfully login');
        }else {
            return back()->with('error', 'Invalid Email Or Password');
        }
    }


    public function EmployerLogout() {
        Auth::guard('employer')->logout();
        return redirect()->route('employer_form')->with('error', 'You have Logout Successfully'); 
    }



    public function EmployerSignup() {
        return view('employers.employer_signup');
    }


    public function EmployerSignupCreate(Request $request) {
        // dd($request->all());

        Employer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    }

    
    
}
