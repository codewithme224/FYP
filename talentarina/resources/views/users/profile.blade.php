@extends('layouts.app')

<head>
    <style>
        body {
            background: #eee;
        }

        .card {
            border: none;

            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }

        .card:before {

            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #E1BEE7;
            transform: scaleY(1);
            transition: all 0.5s;
            transform-origin: bottom
        }

        .card:after {

            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #8E24AA;
            transform: scaleY(0);
            transition: all 0.5s;
            transform-origin: bottom
        }

        .card:hover::after {
            transform: scaleY(1);
        }


        .fonts {
            font-size: 11px;
        }

        .social-list {
            display: flex;
            list-style: none;
            justify-content: center;
            padding: 0;
        }

        .social-list .fa-brands {
            margin: 20px;
            color: #E80078;
            font-size: 19px;
        }


        /* .buttons button:nth-child(1) {
            border: 1px solid #E80078 !important;
            color: #E80078;
            height: 40px;
        }

        .buttons button:nth-child(1):hover {
            border: 1px solid #E80078 !important;
            color: #fff;
            height: 40px;
            background-color: #8E24AA;
        }

        .buttons button:nth-child(2) {
            border: 1px solid #8E24AA !important;
            background-color: #8E24AA;
            color: #fff;
            height: 40px;
        }

        .buttons button:nth-child(2):hover {
            border: 1px solid #8E24AA !important;
            background-color: #E80078;
            color: #fff;
            height: 40px;
        } */

        .buttons button {
            border: 1px solid #E80078 !important;
            color: #E80078;
            height: 40px;
            border-radius: 5px;
            margin: 0 10px;
            padding: 5px 10px;
        }

        .buttons button:hover {
            border: 1px solid #E80078 !important;
            color: #fff;
            height: 40px;
            background-color: #E80078;
        }

        .buttons button a {
            color: black;
            text-decoration: none
        }

        .buttons button a:hover {
            color: white;
            text-decoration: none
        }

        .profile-container {
            position: relative;
            display: inline-block;
        }

        .profile-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: #E80078;
            color: #fff;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }
    </style>
</head>

@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('images/hero_1.jpg'); background-color: #15121A;" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold"> Profile</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ url('/')}}">Home</a> <span class="mx-2 slash">/</span>
                        
                        <span class="text-white"><strong> Profile</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container mt-5">

        @if (\Session::has('update'))
            <div class="alert alert-success">
                <p>{!! \Session::get('update') !!}</p>
            </div>
        @endif

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center profile-container">
                        <img src="{{ asset('assets/profile_images/' . $profile->image . '') }}" width="100"
                            height="100" style="border-radius: 10px">

                        <a href="{{ route('edit.image') }}"><i class="fa-solid fa-camera profile-icon">

                            </i></a>
                    </div>

                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">{{ $profile->name }}</h5>
                        <span>{{ $profile->job_title }}</span>

                        <button class="btn-ss "
                            style="margin: 20 auto; height: 50px; display: block; padding-bottom: 15px;"><a
                                style="color: black;" href="{{ asset('assets/cvs/' . $profile->cv . '') }}">Download CV <i
                                    class="fa-solid fa-download"></i></a>
                        </button>

                        <div class="px-4 mt-1">
                            <p style="font-size: 17px" class="fonts">{{ $profile->bio }} </p>

                        </div>

                        <ul class="social-list">
                            <a href="{{ $profile->facebook }}"> <i class="fa-brands fa-facebook"></i></a>
                            <a href="{{ $profile->linkedin }}">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="{{ $profile->instagram }}">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="{{ $profile->twitter }}">
                                <i class="fa-brands fa-twitter"></i>
                            </a>

                            <a href="{{ $profile->tiktok }}">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>

                        </ul>

                        <div class="buttons">

                            <button class="bt"> <a href="{{ route('edit.details') }}">Update
                                    Profile</a>
                            </button>
                            <button class="bt">
                                <a href="{{ route('edit.cv') }}">Update CV</a>
                            </button>
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>
@endsection
