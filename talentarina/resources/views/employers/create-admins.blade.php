@extends('layouts.admin')

@section('employers')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (\Session::has('create'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('create') !!}</p>
                        </div>
                    @endif
                    <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                    <form method="POST" action="{{ route('store.admins') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="email" id="form2Example1" class="form-control @error('form2Example1') is-invalid @enderror"
                                placeholder="email"  />
                            @error('form2Example1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        @if($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        <div class="form-outline mb-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="name"  />
                        </div>
                        @if($errors->has('name'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example1" class="form-control"
                                placeholder="password"  />
                        </div>
                        @if($errors->has('password'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('password') }}
                            </div>
                        @endif







                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
