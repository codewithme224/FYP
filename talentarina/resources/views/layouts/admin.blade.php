<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            @auth('employer')
                <h1><a href="index.html" class="logo">E.</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="{{ route('employer.dashboard') }}"><span class="fa fa-home"></span> Home</a>
                    </li>
                    <li>
                        <a href="{{ route('display-categories')}}"><span class="fa fa-sticky-note"></span> Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('display-jobs') }}"><span class="fa fa-book"></span> Jobs</a>
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
                        </script> All rights reserved | TalentArina <i class="icon-heart"
                            aria-hidden="true"></i>
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
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @auth('employer')
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('employer.dashboard') }}">Home</a>
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


            <main class="py-4">
                @yield('employers')
            </main>

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

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>

</html>
