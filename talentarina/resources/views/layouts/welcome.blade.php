<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TalentArina</title>
</head>
<body>
    <div class="m-4 navbar-container" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand" style="font-size: 25px">TALENT ARINA</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('about') }}" class="nav-item nav-link active" style="font-size: 20px">About</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link active" style="font-size: 20px">Contact Us</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <div class="nav-item dropdown" style="margin-right: 50px">
                            <a href="#" class="nav-link dropdown-toggle navlink" data-bs-toggle="dropdown">JobSeeker</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                <a href="{{ route('register')}}" class="dropdown-item">Signup</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle navlink" data-bs-toggle="dropdown">Employer</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('employer_form')}}" class="dropdown-item">Login</a>
                                <a href="{{ route('employer.signup')}}" class="dropdown-item">Signup</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')
</body>
</html>