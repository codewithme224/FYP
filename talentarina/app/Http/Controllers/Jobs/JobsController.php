<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Job\Job;
use Illuminate\Http\Request;
use App\Models\Job\JobSaved;
use App\Models\Job\Application;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    

    public function single($id) {

        $job = Job::find($id);


        // Getting related jobs
        $relatedJobs = Job::where('category', $job->category)
        ->where('id', '!=', $job->id)
        ->take(6)
        ->get();

        $relatedJobsCount = Job::where('category', $job->category)
        ->where('id', '!=', $job->id)
        ->take(6)
        ->count();


        // Save job
        $saveJob = JobSaved::where('job_id', $id)
        ->where('user_id', Auth::user()->id)
        ->count();


        // Verifying if user has applied for this job
        $appliedJob = Application::where('job_id', $id)
        ->where('user_id', Auth::user()->id)
        ->count();


        // Categories
        $categories = Category::all();

        return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'saveJob', 'appliedJob', 'categories'));
    }


    public function saveJob(Request $request) {

        $saveJob = JobSaved::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'image' => $request->image,
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'company' => $request->company,
        ]);

        if($saveJob) {
            return redirect('/jobs/single'.$request->job_id. '')->with('save', 'Job saved successfully!');

        }

    }


    // Job apply
    public function jobApply(Request $request) {

        if($request->cv == 'No CV') {
            return redirect('/jobs/single'.$request->job_id. '')->with('apply', 'Please upload your CV first in your profile page!');
        } else {
            $applyJob = Application::create([
                'cv' => Auth::user()->cv,
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                'image' => $request->image,
                'job_title' => $request->job_title,
                'job_region' => $request->job_region,
                'company' => $request->company,
                'job_type' => $request->job_type,
            ]);

            if($applyJob) {
                return redirect('/jobs/single'.$request->job_id. '')->with('applied', 'Job applied successfully!');
    
            }
        }

    }
}
