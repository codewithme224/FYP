@extends('admin.admin_master')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4 d-inline">Job Applications</h5>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">CV</th>
                                        <th scope="col">Job ID</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Region</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $application)
                                        <tr>
                                            <th scope="row">{{$application->id}}</th>
                                            <td>
                                                <a href="{{ route('profile') }}">
                                                    <img class="wd-100 rounded-circle"
                                                src="{{ !empty($user->image) ? asset('assets/profile_images/' . $user->image) : asset('assets/profile_images/default.png') }}"
                                                alt="profile">
                                            <span class="h4 ms-3 text-white">
                                                </a>
                                            </td>
                                            <td><a class="btn btn-success"
                                                    href="{{ asset('assets/cvs/' . $application->cv . '') }}"><span
                                                        class="fa-solid fa-download" style="padding: 5px;"></span>CV</a>
                                            </td>
                                            <td><a class="btn btn-success"
                                                    href="{{ route('single.job', $application->id) }}">Go to Job</a></td>
                                            <td>{{ $application->email }}</td>
                                            <td>{{ $application->job_title }}</td>
                                            {{-- <td>{{ $application->job_region}}</td> --}}
                                            <td><a href="{{ route('email.create', $application->id) }}"
                                                    class="btn btn-success  text-center ">Email</a></td>
                                            <td>
                                                <form method="POST" action="{{route('delete-application', $application->id)}}">
                                                    @csrf
                                        
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
