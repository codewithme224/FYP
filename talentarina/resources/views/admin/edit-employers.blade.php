@extends('admin.admin_master')

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

                                <h6 class="card-title">Edit Employer Details</h6>

                                <form class="forms-sample" method="POST" action="{{ route('update-employers', $employer->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $employer->name }}" name="name" class="form-control mb-2"
                                                id="exampleInputUsername2" require>
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control mb-2"
                                                id="exampleInputEmail2" autocomplete="off" value="{{$employer->email}}"> 
                                                @if ($errors->has('email'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('email') }}
                                                        </div>
                                                    @endif
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="new_password" class="form-control mb-2"
                                                id="exampleInputPassword2" autocomplete="off" placeholder="Leave blank to keep current password">
                                                @if ($errors->has('password'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    @endif
                                        </div>

                            
                                    

                                    <div class="btns" style="display: flex; align-items: flex-end; justify-content: end; margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary me-2">Update Employer</button>
                                    <a href="{{ route('all.employers') }}" class="btn btn-light">Cancel</a>
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
