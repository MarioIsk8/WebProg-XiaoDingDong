<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#success-message').fadeOut('slow');
            }, 2000);

            setTimeout(function() {
                $('#error-message').fadeOut('slow');
            }, 2000);
        });
    </script>

        <title>@yield('title')</title>
</head>
<body style="background-image: url(/assets/download.jpg); width: 100%">
{{-- HEADER --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black">
        <div class="container-fluid">

            {{-- LEFT NAVBAR --}}
            <a class="navbar-brand" href="{{route('home')}}">XiAO DiNG DoNG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    @auth
                        @if (auth()->user()->role == 'user')
                            <a class="nav-link active" href="{{route('managefood.search')}}">Search Food</a>
                            <a class="nav-link active" href="{{route('user.cart')}}">Cart</a>
                        @else
                            <a class="nav-link active" href="{{route('food.add')}}">Add New Food</a>
                            <a class="nav-link active" href="{{route('managefood.index')}}">Manage Food</a>
                        @endif
                    @endauth
                </div>
            </div>

            {{-- RIGHT NAVBAR --}}
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav" >
                    @auth
                        @if (auth()->user()->role == 'user')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-warning d-flex align-items-center gap-3" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome, {{ auth()->user()->name }}
                                    <div style="border: 1px white solid; width: 30px;height: 30px; border-radius: 20px;">
                                        <img id="profilePic" src="{{asset('user/'.auth()->user()->berkas)}}" alt="NoProfilePic" width="100%" height="100%" style="border-radius: 20px;">
                                    </div>
                                </a>

                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item text-warning bg-dark" href="/profile">Profile</a></li>
                                    <li><a class="dropdown-item text-warning bg-dark" href="/history">Transaction History</a></li>
                                    <li><hr style="color: white" class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-warning bg-dark" href="{{route('logout')}}">Sign Out</a></li>
                                </ul>
                            </li>
                            <script>
                                document.getElementById('profilePic').onerror = function() {
                                  this.src = '{{asset('user/default.webp')}}';
                                  this.alt = 'FavIcon';
                                };
                              </script>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome, {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item text-warning bg-dark" href="/profile">Profile</a></li>
                                    <li><hr  style="color: white" class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-warning bg-dark" href="{{route('logout')}}">Sign Out</a></li>
                                </ul>
                            </li>
                        @endif
                    @endauth
                    @guest
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item me-3">
                                <a class="nav-link active " href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active " href="{{route('register')}}">Register</a>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

{{-- CONTENT --}}
<div class="d-flex flex-column align-items-center">
    {{-- style="width: 90%; border: 1px white solid" --}}
    @yield('content')
</div>

@if ($errors->any())
<div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
    <ul class="list-unstyled">
        <li>{{ $errors->first() }}</li>
    </ul>
</div>
@endif
@if(session('success'))
    <div id="success-message" class="alert alert-success position-fixed top-0 start-50 translate-middle-x">
        {{ session('success') }}
    </div>
@endif
{{-- FOOTER --}}
</body>
</html>
