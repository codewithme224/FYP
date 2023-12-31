@extends('layouts.app')

<head>
    <style>
        body {
            background: white;
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



        /*  */

        .chat-btn {
  font-family: inherit;
  font-size: 18px;
  background: #E80078;
  color: white;
  padding: 10px 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
  border-radius: 20px;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
  transition: all 0.3s;
  margin-left: 280px;
}

.chat-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
}

.chat-btn:active {
  transform: scale(0.95);
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}

.chat-btn span {
  display: block;
  margin-left: 0.4em;
  transition: all 0.3s;
}
.chat-btn span a{
    color: white;
    text-decoration: none;
    font-size: 20px;
}

.chat-btn svg {
  width: 18px;
  height: 18px;
  fill: white;
  transition: all 0.3s;
}

.chat-btn .svg-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.2);
  margin-right: 0.5em;
  transition: all 0.3s;
}

.chat-btn:hover .svg-wrapper {
  background-color: rgba(255, 255, 255, 0.5);
}

.chat-btn:hover svg {
  transform: rotate(45deg);
}

a {
    text-decoration: none;
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
                        <a href="{{ url('/') }}">Home</a> <span class="mx-2 slash">/</span>

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
                        <br>
                        <span>{{ $profile->email }}</span>
                        <br>


                        <button class="btn-ss "
                            style="margin: 20 auto; height: 50px; display: block; padding-bottom: 15px;"><a
                                style="color: black;" href="{{ asset('assets/cvs/' . $profile->cv . '') }}">Download CV <i
                                    class="fa-solid fa-download"></i></a>
                        </button>

                        <a style="text-decoration: none;" href="{{ route('chatify', $profile->id) }}">
                            <button class="chat-btn">
                                <div class="svg-wrapper-1">
                                    <div class="svg-wrapper">
                                        <svg height="24" width="24" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                                <span>Chat</span>
                            </button>
                        </a>

                        

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
