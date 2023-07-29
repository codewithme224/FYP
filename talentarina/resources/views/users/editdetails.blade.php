@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image"
style="background-image: url('images/hero_1.jpg'); background-color: #15121A;" id="home-section">
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update Profile</h1>
            <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <a href="#">Job</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Update Profile</strong></span>
            </div>
        </div>
    </div>
</div>
</section>

@if (\Session::has('update'))
<div class="alert alert-success">
    <p>{!! \Session::get('update') !!}</p>
</div>
@endif



<div class="form-container">
    <form class="form" action="{{ route('update.details') }}" method="POST">
        @csrf
        <h2>Update Your Details</h2>
      <div class="form-group">
        <label for="email">Name</label>
        <input type="text" value="{{ $userDetails->name }}" id="name" name="name" required="">
      </div>
      <div class="form-group">
        <label for="email">Job Title</label>
        <input type="text" value="{{ $userDetails->job_title }}" id="job_title" name="job_title" required="">
      </div>
      <div class="form-group">
        <label for="textarea">Bio</label>
        <textarea name="bio" id="bio" rows="10" cols="50" required="">{{ $userDetails->bio }}</textarea>
      </div>

      <div class="form-group">
        <label for="email">Facebook</label>
        <input type="text" value="{{ $userDetails->facebook }}" id="facebook" name="facebook" required="">
      </div>
      <div class="form-group">
        <label for="email">Linkedin</label>
        <input type="text" value="{{ $userDetails->linkedin }}" id="linkedin" name="linkedin" required="">
      </div>
      <div class="form-group">
        <label for="email">Instagram</label>
        <input type="text" value="{{ $userDetails->instagram }}" id="instagram" name="instagram">
      </div>
      <div class="form-group">
        <label for="email">Twitter</label>
        <input type="text" value="{{ $userDetails->twitter }}" id="twitter" name="twitter">
      </div>
      <div class="form-group">
        <label for="email">Tiktok</label>
        <input type="text" value="{{ $userDetails->tiktok }}" id="tiktok" name="tiktok" required="">
      </div>
      <button class="btn-ss" style="width: 40%; margin: 0 auto;" type="submit" name="submit">Update</button>
    </form>
  </div>

@endsection