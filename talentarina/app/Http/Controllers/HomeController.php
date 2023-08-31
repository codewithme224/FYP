<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job\Job;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $duplicates = DB::table('searches')
            ->select('keyword', DB::raw('COUNT(*) as `count`'))
            ->groupBy('keyword')
            ->havingRaw('COUNT(*) > 1')
            ->take(3)
            ->orderBy('count', 'asc')
            ->get();

        $jobs = Job::select()->take(3)->orderBy('id', 'desc')->get();
        $total_jobs = Job::all()->count();

        return view('home', compact('jobs', 'total_jobs', 'duplicates'));
    }
    public function about()
    {

        return view('pages.about');
    }
    public function contact()
    {

        return view('pages.contact');
    }
    public function allJobs()
    {

        $jobs = Job::all(); // Get all jobs from the database

        return view('pages.all-job', compact('jobs'));
    }
}
