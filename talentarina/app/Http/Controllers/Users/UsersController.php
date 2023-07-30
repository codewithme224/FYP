<?php

namespace App\Http\Controllers\Users;

class Exception extends \Exception
{
}

use App\Http\Controllers\Controller;
use App\Models\Job\Application;
use App\Models\Job\JobSaved;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Image;



class UsersController extends Controller
{
    //
    public function profile()
    {
        $profile = User::find(Auth::user()->id);

        return view('users.profile', compact('profile'));
    }


    public function applications()
    {
        $applications = Application::where('user_id', Auth::user()->id)
            ->get();

        return view('users.applications', compact('applications'));
    }
    public function savedJobs()
    {
        $savedJobs = JobSaved::where('user_id', Auth::user()->id)
            ->get();

        return view('users.savedjobs', compact('savedJobs'));
    }
    public function editDetails()
    {
        $userDetails = User::find(Auth::user()->id);

        return view('users.editdetails', compact('userDetails'));
    }

    public function updateDetails(Request $request)
    {
        $userDetailsUpdate = User::find(Auth::user()->id);

        $userDetailsUpdate->update([
            "name" => $request->name,
            "job_title" => $request->job_title,
            "bio" => $request->bio,
            "facebook" => $request->facebook,
            "linkedin" => $request->linkedin,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
            "tiktok" => $request->tiktok,
        ]);

        if ($userDetailsUpdate) {
            return redirect('/users/edit-details')->with('update', 'User details updated successfully!');
        }
    }

    public function editCV()
    {
        // $userDetails = User::find(Auth::user()->id);

        return view('users.editcv');
    }

    public function updateCV(Request $request)
    {
        $deleteOldCV = User::find(Auth::user()->id);

        if (File::exists(public_path('assets/cvs/' . $deleteOldCV->cv))) {
            File::delete(public_path('assets/cvs/' . $deleteOldCV->cv));
        } else {
        
        }



        $destinationPath = 'assets/cvs/';
        $mycv = $request->cv->getClientOriginalName();
        $request->cv->move(public_path($destinationPath), $mycv);

        $deleteOldCV->update([
            "cv" => $mycv
        ]);

        return redirect('/users/profile')->with('update', 'CV updated successfully!');
    }



    public function editImage()
    {

        return view('users.editimage');
    }


    public function updateImage(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // Validate the uploaded image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);


        // Delete the old profile image if it exists
        if ($user->image) {
            $oldImagePath = public_path('assets/profile_images/' . $user->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // Handle file name clashes
        $imageName = time() . '_' . $request->image->getClientOriginalName();

        // Save the new image to the destination path
        $destinationPath = 'assets/profile_images/';
        $request->image->move(public_path($destinationPath), $imageName);

        // Update the user's image field in the database
        $user->update([
            "image" => $imageName,
        ]);

        return redirect('/users/profile')->with('update', 'Profile image updated successfully!');
    }


    

}
