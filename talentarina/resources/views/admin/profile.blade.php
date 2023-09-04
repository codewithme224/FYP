@extends('admin.admin_master')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@section('admin')
    <div class="page-content">

        <div class="row profile-body d-flex justify-content-center mb-7">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <div>
                                <img class="wd-100 rounded-circle"
                                    src="{{ !empty($admin->image) ? asset('assets/upload/admin_images/' . $admin->image) : asset('assets/upload/no_image.jpg') }}"
                                    alt="profile">
                                <span class="h4 ms-3 text-white">{{ $admin->username }}</span>
                            </div>

                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $admin->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                            <p class="text-muted">{{ $formattedCreatedAt }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                            <p class="text-muted">{{ $admin->address }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $admin->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $admin->phone }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper ">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Update Admin Profile</h6>

                                <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control"
                                                id="exampleInputUsername2" value="{{ $admin->username }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control"
                                                id="exampleInputUsername2" value="{{ $admin->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail2" autocomplete="off" value="{{ $admin->email }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" class="form-control"
                                                id="exampleInputMobile" value="{{ $admin->phone }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputAddress"
                                                name="address" autocomplete="off" value="{{ $admin->address }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control" id="image"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-sm-9">
                                            <img id="showImage" class="wd-60 rounded-circle"
                                                src="{{ !empty($admin->image) ? asset('assets/upload/admin_images/' . $admin->image) : asset('assets/upload/no_image.jpg') }}"
                                                alt="profile">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Update</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-light">Cancel</a>
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
