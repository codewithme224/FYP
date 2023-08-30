@extends('layouts.admin')

@section('employers')
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-inline">Jobs</h5>
                        <a href="{{ route('create.jobs') }}" class="btn btn-primary mb-4 text-center float-right">Create
                            Jobs</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Job</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">Experience</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        {{-- <th scope="row">{{ $job->id }}</th> --}}
                                        <td>{{ $job->job_title }}</td>
                                        <td>{{ $job->category }}</td>
                                        <td>{{ $job->salary }}</td>
                                        <td>{{ $job->job_region }}</td>
                                        <td>{{ $job->experience }}</td>
                                        <td>{{ $job->application_deadline }}</td>


                                        <td>
                                            <a href="">
                                                <button type="button" class="btn btn-warning">Edit</button>
                                            </a>
                                        </td>
                                        <td>

                                            <form method="POST" action="">
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
@endsection
