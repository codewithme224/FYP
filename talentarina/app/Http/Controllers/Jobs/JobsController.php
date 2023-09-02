<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Job\Job;
use App\Models\Job\Search;
use Illuminate\Http\Request;
use App\Models\Job\JobSaved;
use App\Models\Job\Application;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{


    public function single($id)
    {

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


        $categories = Category::all();

        // Save job
        if (auth()->user()) {

            $saveJob = JobSaved::where('job_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();


            // Verifying if user has applied for this job
            $appliedJob = Application::where('job_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();

            // Categories

            return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'saveJob', 'appliedJob', 'categories'));
        } else {
            return view('jobs.single', compact('job', 'relatedJobs', 'relatedJobsCount', 'categories'));
        }
    }


    public function saveJob(Request $request)
    {

        $saveJob = JobSaved::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'image' => $request->image,
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'company' => $request->company,
        ]);

        if ($saveJob) {
            return redirect('/jobs/single' . $request->job_id . '')->with('save', 'Job saved successfully!');
        }
    }


    // Job apply
    public function jobApply(Request $request)
    {

        if ($request->cv == 'No CV') {
            return redirect('/jobs/single' . $request->job_id . '')->with('apply', 'Please upload your CV first in your profile page!');
        } else {
            $applyJob = Application::create([
                'cv' => Auth::user()->cv,
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                'email' => Auth::user()->email,
                'image' => $request->image,
                'job_title' => $request->job_title,
                'job_region' => $request->job_region,
                'company' => $request->company,
                'job_type' => $request->job_type,
            ]);

            if ($applyJob) {
                return redirect('/jobs/single' . $request->job_id . '')->with('applied', 'Job applied successfully!');
            }
        }
    }


    public function search(Request $request)
    {

        Request()->validate([
            'job_title' => 'required',
            'job_region' => 'required',
            'job_type' => 'required',


        ]);

        Search::Create([
            'keyword' => $request->job_title
        ]);

        $job_title = $request->get('job_title');
        $job_region = $request->get('job_region');
        $job_type = $request->get('job_type');


        $searches = Job::where('job_title', 'like', '%' . $job_title . '%')
            ->where('job_region', 'like', '%' . $job_region . '%')
            ->where('job_type', 'like', '%' . $job_type . '%')
            ->get();

        $searchesCount = Job::where('job_title', 'like', '%' . $job_title . '%')
            ->where('job_region', 'like', '%' . $job_region . '%')
            ->where('job_type', 'like', '%' . $job_type . '%')
            ->count();

        // Validate if the region "Anywhere" is chosen
        if ($job_region == 'Anywhere') {
            // Set job_region to "Anywhere"
            $job_region = 'Anywhere';

            // Retrieve all jobs without filtering by job_region
            $searches = Job::where('job_title', 'like', '%' . $job_title . '%')
                ->where('job_type', 'like', '%' . $job_type . '%')
                ->get();

            // Count the total number of jobs without filtering by job_region
            $searchesCount = Job::where('job_title', 'like', '%' . $job_title . '%')
                ->where('job_type', 'like', '%' . $job_type . '%')
                ->count();
        } else {
            // If a specific region is chosen, proceed with the original filtering
            $searches = Job::where('job_title', 'like', '%' . $job_title . '%')
                ->where('job_region', 'like', '%' . $job_region . '%')
                ->where('job_type', 'like', '%' . $job_type . '%')
                ->get();

            $searchesCount = Job::where('job_title', 'like', '%' . $job_title . '%')
                ->where('job_region', 'like', '%' . $job_region . '%')
                ->where('job_type', 'like', '%' . $job_type . '%')
                ->count();
        }







        return view('jobs.search', compact('searches', 'searchesCount'));
    }


    
}
