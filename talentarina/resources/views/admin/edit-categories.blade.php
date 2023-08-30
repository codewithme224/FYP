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

                                <h6 class="card-title">Create a Category</h6>

                                <form class="forms-sample" method="POST" action="{{ route('update-categories', $category->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row mb-3">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control mb-2"
                                                id="exampleInputUsername2" required value="{{$category->name}}">
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
 
                                    <div class="btns" style="display: flex; align-items: flex-end; justify-content: end; margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary me-2">Update Category</button>
                                    <a href="{{ route('all.categories') }}" class="btn btn-light">Cancel</a>
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
