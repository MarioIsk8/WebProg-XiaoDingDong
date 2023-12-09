@extends('./components/master')

@section('title','XIAO DING DONG | REGISTER')

@section('content')
    <div style="display:flex;height: 100vh; width:100%;">
        <div style="display: flex; width:60%; height: 100%">
            <img src="{{asset('./assets/login_register.jpg')}}" alt="" height="100%" width="100%" >
        </div>
        <div style="display:flex; justify-content: center; align-items: center; background-color: rgb(11, 11, 11); height:100%; width:40%;">

            <form class="text-white" action="{{route('register.post')}}" method="POST">
                @csrf
                <div class="row mb-3" style="text-align: center">
                    <h2>Register</h2>
                </div>
                {{-- EMAIL --}}
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-form-label">Email Address</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Has to end with '@gmail.com'">
                    </div>
                </div>

                {{-- USERNAME --}}
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-form-label">Username</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Minimum 5 characters, Maximum 50 characters">
                    </div>
                </div>

                {{-- PASSWORD   --}}
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-form-label">Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Minimum 5 characters, Maximum 255 characters">
                    </div>
                </div>

                {{-- CONFIRM PASSWORD   --}}
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-form-label">Confirm Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="inputPassword3" name="confirm_password" placeholder="Has to be the same with Password Field">
                    </div>
                </div>

                {{-- REGISTER BUTTON --}}
                <div class="row mb-3">
                    <button type="submit" class="btn btn-primary col-sm-11 bg-dark" style="margin-left: 15px">Register</button>
                </div>
                <div class="row mb-3" style="text-align: center">
                    <div>
                        <span>Already have an account?</span>
                        <a href="{{route('login')}}" style="text-decoration: none; color: yellow">Log in</a>
                    </div>
                </div>
            </form>
            {{-- @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif --}}
        </div>
    </div>
@endsection
