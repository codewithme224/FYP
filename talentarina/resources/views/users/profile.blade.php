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


        .buttons button:nth-child(1) {
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
        }
    </style>
</head>

@section('content')
    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="{{ asset('assets/profile_images/images.png'.$profile->image.'') }}" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        {{-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> --}}
                        <h5 class="mt-2 mb-0">{{ $profile->name }}</h5>
                        <span>{{ $profile->job_title }}</span>

                        <button class="btn-ss " style="margin: 20 auto; height: 50px; display: block; padding-bottom: 15px;"><a style="color: black;" href="{{ asset('assets/cvs/'.$profile->cv.'') }}">Download CV <i class="fa-solid fa-download"></i></a>
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

                            <button class="btn btn-outline-primary px-4">Message</button>
                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>
@endsection
