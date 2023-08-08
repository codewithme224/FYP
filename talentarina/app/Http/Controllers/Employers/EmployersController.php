<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Job\Application;
use App\Models\Job\Job;
use Illuminate\Http\Request;
use App\Models\Employer;
use Carbon\Carbon;
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
        $jobs = Job::select()->count();

        $application = Application::select()->count();

        $categories = Category::select()->count();

        return view("employers.index", compact('jobs', 'application', 'categories'));
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
            'created_at' => Carbon::now(), 
        ]);

        return redirect()->route('employer_form')->with('error', 'You have Signup Successfully');


    }


    public function allAdmins() {
        $admins = Employer::all();

        return view('employers.all-admins', compact('admins'));
    }


    public function createAdmins() {
        return view('employers.create-admins');
    }


    // Create Admins in employer table
    public function storeAdmins(Request $request) {

        $createAdmins = Employer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($createAdmins) {
            return redirect('employer/all-admins')->with('create', 'Admin created successfully!');
        }
    }


    // public function editAdmins()
    // {
    //     $adminDetails = Employer::find(Auth::guard()->user());

    //     return view('employers.editadmins-details', compact('adminDetails'));
    // }


    // public function updateAdmins(Request $request) {

    //     Request()->validate([
    //         'name' => 'required|max:40',
    //         'email' => 'required|email|max:155',
    //         'password' => 'required|min:8|max:155',
    //     ]);


    //     $editAdmins = Employer::find(Auth::guard()->user());

    //     $editAdmins->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     if ($editAdmins) {
    //         return redirect('employer/edit-admins')->with('create', 'Updated successfully!');
    //     }
    // }


    public function editAdmins()
{
    $adminId = Auth::id();
    $adminDetails = Employer::find($adminId);

    return view('employers.edit_admins-details', compact('adminDetails'));
}


public function updateAdmins(Request $request) {

    Request()->validate([
        'name' => 'required|max:40',
        'email' => 'required|email|max:155',
    ]);

    $adminId = Auth::id();
    $editAdmins = Employer::find($adminId);

    $editAdmins->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    if ($editAdmins) {
        return redirect('employer/edit-admins')->with('create', 'Updated successfully!');
    } else {
        return redirect('employer/edit-admins')->with('create', 'Updated successfully!');
    }

}

    
    
}
