@extends('layouts.admin')

{{-- @if (Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> {{ session::get('error') }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif --}}
@section('employers')

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
                    <th scope="row">1</th>
                    <td><a class="btn btn-success" href="{{ asset('assets/cvs/'.$application->cv.'')}}"><span class="fa-solid fa-download" style="padding: 5px;"></span>CV</a></td>
                    <td><a class="btn btn-success" href="{{ route('single.job',$application->id)}}">Go to Job</a></td>
                    <td>{{ $application->email}}</td>
                    <td>{{ $application->job_title}}</td>
                    {{-- <td>{{ $application->job_region}}</td> --}}
                    <td><a href="{{route('email.create', $application->id)}}" class="btn btn-success  text-center ">Email</a></td>
                    <td><a href="#" class="btn btn-danger  text-center ">delete</a></td>
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
    



