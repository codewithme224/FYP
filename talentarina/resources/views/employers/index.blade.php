@extends('employers.employer')

@section('employers')
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            @auth('employer')
            <h1><a href="index.html" class="logo">E.</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="{{ route('employer.dashboard')}}"><span class="fa fa-home"></span> Home</a>
                </li>
                <li>
                    <a href="{{ route('views.admins')}}"><span class="fa fa-user"></span> Admins</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sticky-note"></span> Categories</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-book"></span> Jobs</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-briefcase"></span> Applications</a>
                </li>
                <li>
                    <a href="{{ route('employer.logout') }}"><span class="fa-solid fa-arrow-right-from-bracket">
                            <form method="POST" action="{{ route('employer.logout') }}">
                                @csrf
                            </form>
                        </span> Logout</a>

                    <i></i>

                </li>

            </ul>

            <div class="footer">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | TalentArina <i class="icon-heart" aria-hidden="true"></i>
                </p>
            </div>
            @endauth
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @auth('employer')
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('employer.dashboard')}}">Home</a>
                            </li>
                        </ul>

                        <div class="dropdown" style="margin-top: -px">
                            <button class="dropdown-btn" aria-haspopup="menu"
                                style="padding: 5px 20px; border: none; border-radius: 10px;">
                                <span>{{ Auth::guard('employer')->user()->name }}</span>
                                <span class="arrow"></span>
                            </button>
                        </div>
                        @endauth
                    </div>
            </nav>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jobs</h5>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
                                <p class="card-text">number of jobs: {{$jobs}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Categories</h5>

                                <p class="card-text">number of categories: {{$categories}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Admins</h5>

                                <p class="card-text">number of admins: 3</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Applications</h5>

                                <p class="card-text">number of applications: {{$application}}</p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    @if (Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> {{ session::get('error') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    </div>
@endsection
