<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer\Employer;
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
            return redirect()->route('employer.dashboard')->with('error', 'Employer Login Successfully');
        }else {
            return back()->with('error', 'Invalid Email Or Password');
        }
    }

    
    
}
