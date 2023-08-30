@extends('admin.admin_master')

<style>
      input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        width: 20px;
        height: 20px;
        cursor: pointer;
        
        }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@section('admin')
    <div class="page-content">

        <div class="row profile-body d-flex justify-content-center mb-7">
            <!-- left wrapper start -->
            
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper ">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Post a Job</h6>

                                <form class="forms-sample" method="POST" action="{{ route('store-jobs') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Job Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="job_title" class="form-control mb-2"
                                                id="exampleInputUsername2" require>
                                                @if ($errors->has('job_title'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('job_title') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-9">
                                            <select name="job_region" class="select2 form-control mb-2" data-width="100%" data-live-search="true" title="Select Region">
                                                <option>Select Region</option>
                                                <option value="Ahafo Region">Ahafo Region</option>
                                                <option value="">Ashanti Region</option>
                                                <option value="Ashanti Region">Bono East</option>
                                                <option value="Bono Region">Bono Region</option>
                                                <option value="Central Region">Central Region</option>
                                                <option value="Eastern Region">Eastern Region</option>
                                                <option value="Greater Accra">Greater Accra</option>
                                                <option value="North East">North East</option>
                                                <option value="Northern Region">Northern Region</option>
                                                <option value="Oti Region">Oti Region</option>
                                                <option value="Savannah Region">Savannah Region</option>
                                                <option value="Upper East">Upper East</option>
                                                <option value="Upper West">Upper West</option>
                                                <option value="Volta Region">Volta Region</option>
                                                <option value="Western North">Western North</option>
                                                <option value="Western Region">Western Region</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Company</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="company" class="form-control mb-2"
                                                id="exampleInputUsername2" require>
                                                @if ($errors->has('company'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('company') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Job Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control mb-2" name="job_type" id="job_type">
                                                <option value="">Select Job Type</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Contract">Contract</option>
                                                <option value="Internship">Internship</option>
                                                <option value="Temporary">Temporary</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Vacancy</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="vacancy" class="form-control mb-2"
                                                id="exampleInputUsername2" require>
                                                @if ($errors->has('vacancy'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('vacancy') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Experience</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="experience" class="form-control mb-2"
                                                id="exampleInputUsername2" require>
                                                @if ($errors->has('experience'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('experience') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Salary</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="salary" class="form-control mb-2"
                                                id="exampleInputUsername2" require>
                                                @if ($errors->has('salary'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('salary') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select class="form-control mb-2" name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Any">Any</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Application Deadline</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="application_deadline" class="form-control mb-2"
                                                id="application_deadline" autocomplete="off">
                                                @if ($errors->has('application_deadline'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('application_deadline') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Job Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control mb-2" name="job_description" rows="4" cols="50"></textarea>
                                                @if ($errors->has('job_description'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('job_description') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Responsibilities</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control mb-2" name="responsibilities" rows="4" cols="50"></textarea>
                                                @if ($errors->has('responsibilities'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('responsibilities') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Qualification</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="education_experience" class="form-control mb-2"
                                                id="exampleInputPassword2" autocomplete="off">
                                                @if ($errors->has('education_experience'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('application_deadline') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Other Benefits</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control mb-2" name="other_benefits" rows="4" cols="50"></textarea>
                                                
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">
                                            Logo</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control" id="image"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-sm-9">
                                            <img id="showImage" class="wd-100 rounded-circle"
                                                src="{{ !empty($job->image) ? asset('assets/images/' . $job->image) : asset('assets/images/no_image.jpg') }}"
                                                alt="profile">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Categories</label>
                                        <div class="col-sm-9">
                                            <select class="form-control mb-2" name="category" id="category">
                                                <option>Select Category</option> 
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="btns" style="display: flex; align-items: flex-end; justify-content: end; margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary me-2">Create</button>
                                    <a href="{{ route('all.jobs') }}" class="btn btn-light">Cancel</a>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- middle wrapper end -->
                <!-- right wrapper start -->

                <!-- right wrapper end -->
            </div>

        </div>

        <script>
            $(document).ready(function() {
                $('#image').change(function(e) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });

        
        </script>
    @endsection
