@extends('layouts.app')



@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('images/hero_1.jpg'); background-color: #15121A;" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Search Results</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Search Results</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <h2 class="number-jobs">Search Results</h2>
    <h2 class="" style="text-align: center; margin: 20px; color: #ff0084;">{{ $searchesCount }} Job Found</h2>

    <div class="container">
        @php
            $jobsPerRow = 3; // Define the number of jobs per row
            $jobCount = 0; // Initialize job count variable
        @endphp

        @if ($searches->count() > 0)
            @foreach ($searches as $job)
                @if ($jobCount % $jobsPerRow === 0)
                    <div class="row">
                @endif

                <div class="col-md-4" style="padding: 10px;">
                    <div class="card-job-post" style="background-color: #15121A; margin-left: -20px; width: 430px">
                        <a href="{{ route('single.job', $job->id) }}"></a>
                        <div class="job-content">
                            <p class="heading">{{ $job->job_title }}</p>
                            <img class="job-logo" src="{{ asset('assets/images/' . $job->image . '') }}" alt="">
                            <p class="para">{{ $job->job_description }}</p>
                            <div class="job-details">
                                <span><i class="fa-solid fa-briefcase"></i>{{ $job->company }}</span>
                                <span><i class="fa-solid fa-location-dot"></i>{{ $job->job_region }}</span>
                                <span><i class="fa-solid fa-clock"></i>{{ $job->job_type }}</span>
                            </div>
                            <button class="btn"><a href="{{ route('single.job', $job->id) }}">Apply</a></button>
                        </div>
                    </div>
                </div>

                @php
                    $jobCount++;
                @endphp

                @if ($jobCount % $jobsPerRow === 0 || $loop->last)
    </div><!-- Close the row if the current job is the third in the row or it's the last job -->
    @endif
    @endforeach
@else
    <div class="row justify-content-center" style="margin-left: -10px; margin-right: -10px">
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <div class="card-job-post" style="background-color: #15121A; color: white;">
                <div class="job-content">
                    <p class="heading">No jobs found with this search</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
    
@endsection
