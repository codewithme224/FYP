<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationResponse;
use App\Models\Employer;
use App\Models\Job\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function create()
    {


        $user = Auth::user();

        return view('emails.application-response', compact('user'));
    }


    public function sendEmail(Request $request)
    {
        // dd($request->all());
        // Validate the form data
        $request->validate([
            'applicant_email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
        ]);

        // Get the applicant's email from the form
        $applicantEmail = $request->input('applicant_email');

        // Get the subject and content from the form
        $subject = $request->input('subject');
        $content = $request->input('content');

        try {
            // Send the email using Laravel's Mail facade
            Mail::to($applicantEmail)->send(new ApplicationResponse($subject, $content));

            return redirect()->back()->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Please try again.');
        }

       
    }

    // check if we are online
    public function isOnline() {
        return response()->json(['status' => 'online']);

    }
}
