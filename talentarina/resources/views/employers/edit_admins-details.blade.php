@extends('layouts.admin')

@section('employers')
    <div class="row">
        <div class="col">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    @if (Session::has('update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ session::get('update') }} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h5 class="card-title mb-5 d-inline">Edit Details</h5>
                    <form method="POST" action="{{ route('updateadmins-details', $admin->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" value="{{ $admin->email }}" name="email" id="form2Example1"
                                class="form-control" placeholder="email" />

                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="name" value="{{ $admin->name }}" id="form2Example1"
                                class="form-control" placeholder="name" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
