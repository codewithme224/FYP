@extends('admin.admin_master')


@section('admin')

<div class="page-content">
<div class=" stretch-card d-flex justify-content-center mb-7" >
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4">
                            <h6 class="card-title mb-0">Jobs</h6>

                            <div class="col-md-4">
                                <a href="{{route('create-jobs')}}">
                                    <button type="button" class="btn btn-primary">Add Job</button>
                                </a>
                            </div>
                            
                        </div>
                        <!-- button -->
                        
                            
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Title</th>
                                        <th class="pt-0">Logo</th>
                                        <th class="pt-0">Region</th>
                                        <th class="pt-0">Company</th>
                                        <th class="pt-0">Salary</th>
                                        <th class="pt-0">Deadline</th>
                                        <th class="pt-0">Experience</th>
                                        <th class="pt-0">Category</th>
                                        <th class="pt-0">Edit</th>
                                        <th class="pt-0">Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <th scope="row">{{$job->id }}</th>
                                           
                                <span class="h4 ms-3 text-white"></td>
                                            <td>{{ $job->job_title }}</td>
                                            <td><img class="wd-100 rounded-circle"
                                                src="{{ !empty($job->image) ? asset('assets/images/' . $job->image) : asset('assets/images/no_image.jpg') }}"
                                                alt="profile"></td>
                                            <td>{{ $job->job_region }}</td>
                                            <td>{{ $job->company }}</td>
                                            <td>{{ $job->salary }}</td>
                                            <td>{{ $job->application_deadline }}
                                            </td>
                                            <td>{{ $job->experience }}
                                            </td>
                                            <td>{{ $job->category }}</td>
                                            <td>
                                                <a href="{{route('edit-jobs', $job->id)}}">
                                                    <button type="button" class="btn btn-warning">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                
                                                <form method="POST" action="{{route('delete-jobs', $job->id)}}">
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