@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image"
style="background-image: url('images/hero_1.jpg'); background-color: #15121A;" id="home-section">
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update CV</h1>
            <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <a href="{{ route('profile') }}">Profile</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Update CV</strong></span>
            </div>
        </div>
    </div>
</div>
</section>





<div class="form-container">
    <form class="form" action="{{ route('update.cv') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <h2>Update Your CV</h2>
      <div class="form-group">
        <label for="email">CV</label>
        <input type="file" id="cv" name="cv" required="">
      </div>
      
      <button class="btn-ss" style="width: 40%; margin: 0 auto;" type="submit" name="submit">Update</button>
    </form>
  </div>

@endsection