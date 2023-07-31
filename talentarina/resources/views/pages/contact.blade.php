@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image"
style="background-image: url('images/hero_1.jpg'); background-color: #15121A;" id="home-section">
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Contact Us</h1>
            <div class="custom-breadcrumbs">
                <a href="{{ url('/') }}">Home</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Contact Us</strong></span>
            </div>
        </div>
    </div>
</div>
</section>

<section class="contact-page">
    <div class="form-container">
        <div class="form">
            <span class="heading">Get in touch</span>
            <input placeholder="Name" type="text" class="input">
            <input placeholder="Email" id="mail" type="email" class="input">
            <textarea placeholder="Say Hello" rows="10" cols="30" id="message" name="message" class="textarea"></textarea>
            <div class="button-container">
            <div class="send-button">Send</div>
            <div class="reset-button-container">
                <div id="reset-btn" class="reset-button">Reset</div>
            </div>
        </div>
    </div>
    </div>

    <img src="{{ asset('assets/images/bg6-2.png') }}" alt="">
</section>

@endsection