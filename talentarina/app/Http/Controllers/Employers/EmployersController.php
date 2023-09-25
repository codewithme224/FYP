<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationResponse;
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
        // $jobs = Job::select()->count();

        // $application = Application::select()->count();


        $employer_id = Auth::guard('employer')->id(); 

        $jobs = Job::where('employer_id', $employer_id)->count();

        $application = Application::whereIn('job_id', Job::where('employer_id', $employer_id)->pluck('id'))->count();

        $categories = Category::select()->count();

        return view("employers.index", compact('jobs', 'application', 'categories'));
    }



    public function Login(Request $request)
    {
        

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
        // $jobs = Job::all();

        $employer_id = Auth::guard('employer')->id(); // Get the ID of the currently logged in employer

        // Get the jobs created by the current logged in employer
        $jobs = Job::where('employer_id', $employer_id)->get();
        
        return view('employers.display-jobs', compact('jobs'));
    }


    // Create jobs
    public function createJobs() {
        $categories = Category::all();
        return view('employers.create-jobs', compact('categories'));
    }


    // Store Jobs
    public function storeJobs(Request $request)
    {
        $request->validate([
            'job_title' => 'required|min:3|max:50',
            'job_region' => 'required',
            'company' => 'required',
            'job_type' => 'required',
            'vacancy' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'gender' => 'required',
            'application_deadline' => 'required|min:3|max:50',
            'job_description' => 'required',
            'responsibilities' => 'required',
            'education_experience' => 'required',
            'other_benefits' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',

            
    
        ]);

        // check if job_description, responsibilities and other_benefits is higher than 400 words. if it is raise an error

        if (str_word_count($request->job_description) > 400) {
            return redirect()->back()->with('error', 'Job description must not be more than 400 words');
        }

        if (str_word_count($request->responsibilities) > 400) {
            return redirect()->back()->with('error', 'Responsibilities must not be more than 400 words');
        }

        if (str_word_count($request->other_benefits) > 400) {
            return redirect()->back()->with('error', 'Other benefits must not be more than 400 words');
        }

        $destinationPath = 'assets/images/';
        $my_image = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $my_image);

        $createJobs = Job::create([
            'employer_id' => Auth::guard('employer')->id(),
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'company' => $request->company,
            'job_type' => $request->job_type,
            'vacancy' => $request->vacancy,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'gender' => $request->gender,
            'application_deadline' => $request->application_deadline,
            'job_description' => $request->job_description,
            'responsibilities' => $request->responsibilities,
            'education_experience' => $request->education_experience,
            'other_benefits' => $request->other_benefits,
            'image' => $my_image,
            'category' => $request->category,
        ]);

        

       

        



        if ($createJobs) {
            return redirect('employer/display-jobs')->with('create', 'Job created successfully!');
        }

        $notification = array(
            'message' => 'Job created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    // edit jobs
    public function editJobs($id)
    {
        $job = Job::find($id);
        $categories = Category::all();
        return view('employers.edit-jobs', compact('job', 'categories'));
    }

    // update jobs
    public function updateJobs(Request $request, $id) {

        $request->validate([
            'job_title' => 'required|min:3|max:50',
            'job_region' => 'required',
            'company' => 'required',
            'job_type' => 'required',
            'vacancy' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'gender' => 'required',
            'application_deadline' => 'required|min:3|max:50',
            'job_description' => 'required|min:3|max:5000',
            'responsibilities' => 'required|min:3|max:5000',
            'education_experience' => 'required|min:3|max:500',
            'other_benefits' => 'required|min:3|max:500',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'category' => 'required',
        ]);
    
        $jobs = Job::find($id);
        $jobs->job_title = $request->job_title;
        $jobs->job_region = $request->job_region;
        $jobs->company = $request->company;
        $jobs->job_type = $request->job_type;
        $jobs->vacancy = $request->vacancy;
        $jobs->experience = $request->experience;
        $jobs->salary = $request->salary;
        $jobs->gender = $request->gender;
        $jobs->application_deadline = $request->application_deadline;
        $jobs->job_description = $request->job_description;
        $jobs->responsibilities = $request->responsibilities;
        $jobs->education_experience = $request->education_experience;
        $jobs->other_benefits = $request->other_benefits;
    
        // image upload validation
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('assets/images/' . $jobs->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/images/'), $filename);
            $jobs->image = $filename; // assign the filename to the image attribute
        }
    
        $jobs->category = $request->category;
        $jobs->save();
    
        if ($jobs) {
            return redirect('employer/display-jobs')->with('success', 'Updated successfully!');
        }
    }


    // delete jobs
    public function deleteJobs($id)
    {
        $jobs = Job::find($id);

        if ($jobs) {
            $jobs->delete();
            return redirect('employer/display-jobs')->with('success', 'Deleted successfully!');
        } else {
            return redirect('employer/display-jobs')->with('error', 'Job not found.');
        }



    }


    //! Application Section

    // Display Applications
    public function DisplayApplications()
    {
        $employer_id = Auth::guard('employer')->id(); // Get the ID of the currently logged in employer

        // Get the jobs created by the current logged in employer
        $jobs = Job::where('employer_id', $employer_id)->pluck('id');

        // Get the applications for the jobs created by the current logged in employer
        $applications = Application::whereIn('job_id', $jobs)->get();

        return view('employers.display-applications', compact('applications'));
    }
}
