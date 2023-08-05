@extends('employers.employer')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}

body {
  background: #dde1e7;
  /* overflow: hidden; */
}

.container-1 {
  width: 100%;
  /* height: 100vh; */
  margin-top: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  /* background-image: url("assets/images/log.jpg"); */
}
.content {
  width: 530px;
  padding: 40px 30px;
  background: #dde1e7;
  /* border-radius: 10px; */
  box-shadow: -3px -3px 7px #ffffff73,
               2px 2px 5px rgba(94,104,121,0.288);
}

.content .text {
  font-size: 33px;
  font-weight: 600;
  margin-bottom: 35px;
  color: #595959;
}

.field {
  height: 50px;
  width: 100%;
  margin-bottom: 30px;
  display: flex;
  position: relative;
}

.field:nth-child(2) {
  margin-top: 20px;
}

.field .input {
  height: 100%;
  width: 100%;
  padding-left: 45px;
  outline: none;
  border: none;
  font-size: 18px;
  background: #dde1e7;
  color: #595959;
  border-radius: 25px;
  box-shadow: inset 2px 2px 5px #BABECC,
              inset -5px -5px 10px #ffffff73;
}

.field .input:focus {
  box-shadow: inset 1px 1px 2px #BABECC,
              inset -1px -1px 2px #ffffff73;
}

.field .span {
  margin-top: 15px;
  position: absolute;
  color: #595959;
  width: 50px;
  line-height: 55px;
}

.field .span i {
  margin-top: 15px;
  position: absolute;
  color: #595959;
  width: 50px;
  line-height: 55px;
}

.field .label {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 45px;
  pointer-events: none;
  color: #666666;
}

.field .input:valid ~ label {
  opacity: 0;
}

.forgot-pass {
  text-align: left;
  margin: 10px 0 10px 5px;
}

.forgot-pass a {
  font-size: 16px;
  color: #666666;
  text-decoration: none;
}

.forgot-pass:hover a {
  text-decoration: underline;
}

.button-register {
  margin: 15px 0;
  width: 100%;
  height: 50px;
  font-size: 18px;
  line-height: 50px;
  font-weight: 600;
  background: #dde1e7;
  border-radius: 25px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #595959;
  box-shadow: 2px 2px 5px #BABECC,
             -5px -5px 10px #ffffff73;
}

.button-register:focus {
  color: #3498db;
  box-shadow: inset 2px 2px 5px #BABECC,
             inset -5px -5px 10px #ffffff73;
}

.sign-up {
  margin: 10px 0;
  color: #595959;
  font-size: 16px;
}

.sign-up a {
  color: #3498db;
  text-decoration: none;
}

.sign-up a:hover {
  text-decoration: underline;
} 

#email {
    margin-bottom: 30px;
}

.log-img{
    width: 530px;
    height: 570px;
    /* margin: 25px; */
    object-fit: cover;
    /* border-radius: 10px; */
    box-shadow: -3px -3px 7px #ffffff73,
               2px 2px 5px rgba(94,104,121,0.288);
}

.email-icon  {
    
  margin-top: 18px;
  margin-left: 20px ;
  position: absolute;
  color: #595959;
  width: 60px;
  height: 60px;
  line-height: 55px;
}

.email-icon i {
    height: 70px;
    width: 70px;
}

</style>
</head>

@section('employers')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container-1">
<div class="content">
        <div class="text">{{ __('Register') }}</div>
         <form method="POST" action="{{ route('employer.signup.create') }}">
            @csrf

            <!-- Name -->
            <div class="field">
               <input placeholder="Name" id="name" type="text" name="name" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
               @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
               <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path></g></svg></span>

                           
            </div>


            <div class="field">
               <input placeholder="Email Address" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="input @error('email') is-invalid @enderror">
               @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <span class="email-icon">
                <i class="fa-solid fa-envelope"></i>
                </span>
             
            </div>

            <!-- Password -->
            <div class="field">
               <input placeholder="Password" type="password" class="input @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">

               @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror

               <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0"></path></g></svg></span>
            </div>

            <!-- Confirm Password -->
            <div class="field">
            <input placeholder="Confirm Password" id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">


               <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0"></path></g></svg></span>
            </div>
            <button class="button-register">{{ __('Signup') }}</button>
            <div class="text-2" style="color: black">Already have an account? <a href="{{ route('employer.login') }}">Login</a></div>
         </form>
      </div>

      <!-- <img class="log-img" src="{{ asset('assets/images/login.jpg')}}" alt=""> -->
</div>
</div>
@endsection
