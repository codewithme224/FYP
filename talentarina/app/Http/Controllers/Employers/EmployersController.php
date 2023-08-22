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

    public function Index()
    {
        return view("employers.employer_login");
    }
    public function Dashboard()
    {
        $jobs = Job::select()->count();

        $application = Application::select()->count();

        $categories = Category::select()->count();

        return view("employers.index", compact('jobs', 'application', 'categories'));
    }



    public function Login(Request $request)
    {
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('employer')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('employer.dashboard')->with('error', 'You Have Successfully login');
        } else {
            return back()->with('error', 'Invalid Email Or Password');
        }
    }


    public function EmployerLogout()
    {
        Auth::guard('employer')->logout();
        return redirect()->route('employer_form')->with('error', 'You have Logout Successfully');
    }



    public function EmployerSignup()
    {
        return view('employers.employer_signup');
    }


    public function EmployerSignupCreate(Request $request)
    {
        // dd($request->all());

        Employer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('employer_form')->with('error', 'You have Signup Successfully');
    }


    public function allAdmins()
    {
        $admins = Employer::all();

        return view('employers.all-admins', compact('admins'));
    }


    public function createAdmins()
    {
        return view('employers.create-admins');
    }


    // Create Admins in employer table
    public function storeAdmins(Request $request)
    {

        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $createAdmins = Employer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($createAdmins) {
            return redirect('employer/all-admins')->with('create', 'Admin created successfully!');
        }
    }



    public function editAdmins($id)
    {
        $admin = Employer::find($id);
        return view('employers.edit_admins-details')->with('admin', $admin);
    }

    public function updateAdmins(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);


        $admin = Employer::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        // $admin->password = Hash::make($request->password);

        if ($admin->save()) {
            return redirect('employer/all-admins')->with('success', 'Updated successfully!');
        }
    }



    public function deleteAdmins($id)
    {

        $admin = Employer::find($id);

        $admin->delete();

        return redirect('employer/all-admins')->with('delete', 'Admin deleted successfully!');
    }


    public function DisplayCategories()
    {
        $categories = Category::all();
        return view('employers.display-categories', compact('categories'));
    }

    public function createCategories()
    {
        return view('employers.create-categories');
    }


    public function storeCategories(Request $request)
    {
        // dd($request->all());

        Request()->validate([
            'name' => 'required',
        ]);

        $createCategory = Category::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        if ($createCategory) {
            return redirect('employer/display-categories')->with('success', 'Category created successfully!');
        }
    }


    public function editCategories($id)
    {
        $categories = Category::find($id);
        return view('employers.edit-categories', compact('categories'));
    }


    public function updateCategories(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
        ]);

        $categoryUpdate = Category::find($id);
        $categoryUpdate->update([
            'name' => $request->name,
        ]);

        if ($categoryUpdate->save()) {
            return redirect('employer/display-categories')->with('success', 'Updated successfully!');
        }
    }


    public function deleteCategory($id)
    {
        $deleteCategory = Category::find($id);

        $deleteCategory->delete();

        if ($deleteCategory) {
            return redirect('employer/display-categories')->with('success', 'Category deleted successfully!');
        }
    }



    // Jobs
    public function DisplayJobs()
    {
        $jobs = Job::all();
        return view('employers.display-jobs', compact('jobs'));
    }
}
