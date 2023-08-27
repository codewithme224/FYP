<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Employer;
use App\Models\Admin;
use App\Models\Job\Job;
// use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    //

    public function Index()
    {
        return view('admin.view-login');
    }


    public function Dashboard()
    {
        // list all users
        $users = User::select()->count();

        // based on the number of users, calculate the percentage
        $percentage = $users / 100;

        // list all employers in the database
        $employers = \App\Models\Employer::all()->count();

        $employersPercentage = $employers / 100;


        $jobs = Job::all()->count();

        $jobsPercentage = $jobs / 100;

        // show the number of applications and group them by today, this week, this month, this year using the created_at column
        $todayApplications = Job::whereDate('created_at', today())->count();
        $weekApplications = Job::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $monthApplications = Job::whereMonth('created_at', now()->month)->count();
        $yearApplications = Job::whereYear('created_at', now()->year)->count();





        return view('admin.index', compact('users', 'percentage', 'employers', 'employersPercentage', 'jobs', 'jobsPercentage', 'todayApplications', 'weekApplications', 'monthApplications', 'yearApplications'));
    }

    // SIGN UP
    public function SignUp()
    {
        return view('admin.view-signup');
    }


    public function AdminSignupCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|confirmed'
        ]);

        // check if password is less 8 characters, if it is give an error message
        if (strlen($request->password) < 8) {
            return redirect()->back()->with('error', 'Password must be at least 8 characters');
        }




        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('login_form')->with('success', 'Registered Successfully, Please Login');
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


    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'Logout Successfully');
    }


    public function AdminProfile()
    {
        $admin = Auth::guard('admin')->user();
        // Assuming $admin is your admin model instance
        $formattedCreatedAt = Carbon::parse($admin->created_at)->format('M d, Y ');

        // dd($admin);
        return view('admin.profile', compact('admin', 'formattedCreatedAt'));
    }

    
    public function AdminProfileStore(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($id);
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;

        // image upload validation
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('assets/upload/admin_images/' . $admin->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/upload/admin_images'), $filename);
            $admin['image'] = $filename;
        }

        $admin->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );



        return redirect()->back()->with($notification);
    }


    public function AdminChangePassword()
    {
        $admin = Auth::guard('admin')->user();
        $formattedCreatedAt = Carbon::parse($admin->created_at)->format('M d, Y ');

        return view('admin.password-change', compact('admin', 'formattedCreatedAt'));
    }


    public function AdminUpdatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8'
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;

        if (!Hash::check($request->old_password, $hashedPassword)) {
            

                // Auth::guard('admin')->logout();

                $notification = array(
                    'message' => 'Old Password Does Not Match!',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
        }


        // Update the new password
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        $notification = array(
            'message' => 'Password Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        
    }


    // show all admins
    public function allUsers()
    {
        $users = User::all();
        return view('admin.all-users', compact('users'));
    }

    // create admins
    public function createUsers()
    {
        return view('admin.create-users');
    }


    // Store admin
    public function storeUsers(Request $request)
    {
        

        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8'
        ]);

        // check if password is less 8 characters, if it is give an error message
        if (strlen($request->password) < 8) {
            return redirect()->back()->with('error', 'Password must be at least 8 characters');
        }

        // check if email already exists
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            return redirect()->back()->with('error', 'Email already exists');
        }




        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();


        if ($users) {
            return redirect('admin/all-users')->with('create', 'Admin created successfully!');
        }

        $notification = array(
            'message' => 'User created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    // Update Users
    public function editUsers($id)
    {
        $user = User::find($id);
        return view('admin.edit-users', compact('user'));
    }

    // update
    public function updateUsers(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:admins',
            
            
        ]);

       

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();

        if ($users->save()) {
            return redirect('admin/all-users')->with('success', 'Updated successfully!');
        }

        // Check if a new password was provided
        $newPassword = $request->input('new_password');
        if (!empty($newPassword)) {
            $users->password = Hash::make($newPassword);
        }


    }

    // delete
    public function deleteUsers($id)
    {
        $users = User::find($id);
        $users->delete();

        if ($users->delete()) {
            return redirect('admin/all-users')->with('success', 'Deleted successfully!');
        }
    }



    //! Employers Section

    // Show all employers
    public function allEmployers()
    {
        $employers = \App\Models\Employer::all();
        return view('admin.all-employers', compact('employers'));
    }

    // create employers
    public function createEmployers()
    {
        return view('admin.create-employers');
    }

    // store employer
    public function storeEmployers(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:employers',
            'password' => 'required|min:8'
        ]);

        // check if password is less 8 characters, if it is give an error message
        if (strlen($request->password) < 8) {
            return redirect()->back()->with('error', 'Password must be at least 8 characters');
        }

        // check if email already exists
        $checkEmail = \App\Models\Employer::where('email', $request->email)->first();
        if ($checkEmail) {
            return redirect()->back()->with('error', 'Email already exists');
        }


        $employers = \App\Models\Employer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);


        if ($employers) {
            return redirect('admin/all-employers')->with('create', 'Admin created successfully!');
        }

        $notification = array(
            'message' => 'Employer created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    // edit employers
    public function editEmployers($id)
    {
        $employer = \App\Models\Employer::find($id);
        return view('admin.edit-employers', compact('employer'));
    }

    // update employers
    public function updateEmployers(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            
            
        ]);

       

        $employers = \App\Models\Employer::find($id);
        $employers->name = $request->name;
        $employers->email = $request->email;
        $employers->save();

        if ($employers->save()) {
            return redirect('admin/all-employers')->with('success', 'Updated successfully!');
        }

        // Check if a new password was provided
        $newPassword = $request->input('new_password');
        if (!empty($newPassword)) {
            $employers->password = Hash::make($newPassword);
        }
    }


    // delete employers
    public function deleteEmployers($id)
    {
        $employers = \App\Models\Employer::find($id);
        $employers->delete();

        if ($employers->delete()) {
            return redirect('admin/all-employers')->with('success', 'Deleted successfully!');
        }
    }










}