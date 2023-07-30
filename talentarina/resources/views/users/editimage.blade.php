@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image"
style="background-image: url('images/hero_1.jpg'); background-color: #15121A;" id="home-section">
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Update Profile Picture</h1>
            <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <a href="{{ route('profile') }}">Profile</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Update Profile Picture</strong></span>
            </div>
        </div>
    </div>
</div>
</section>





<div class="form-container">
    <form class="form" action="{{ route('update.image') }}" method="POST"  enctype="multipart/form-data" onsubmit="return validateImageSize();">
        @csrf
        <h2>Update Your Profile Picture</h2>
      <div class="form-group">
        <label for="image">Profile Picture</label>
        <input type="file" name="image" required="" enctype="multipart/form-data" accept="image/*" id="imageInput">
      </div>
      
      <button class="btn-ss" style="width: 40%; margin: 0 auto;" type="submit" name="submit">Update</button>
    </form>
  </div>


  <script>
    function validateImageSize() {
        const imageInput = document.getElementById('imageInput');
        if (imageInput.files.length > 0) {
            const imageSize = imageInput.files[0].size; // in bytes
            const maxSizeInBytes = 2 * 1024 * 1024; // 2MB in bytes
    
            if (imageSize > maxSizeInBytes) {
                alert('Please provide an image below 2MB in size.');
                return false; // Prevent form submission
            }
        }
    
        return true; // Allow form submission
    }
    </script>
    

@endsection