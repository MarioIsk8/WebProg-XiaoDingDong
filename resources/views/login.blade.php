@extends('./components/master')

@section('title','XIAO DING DONG | LOGIN')

@section('content')
    <div style="display:flex;height: 100vh; width:100%;">
        <div style="display: flex; width:60%; height: 100%">
            <img src="{{asset('./assets/login_register.jpg')}}" alt="" height="100%" width="100%" >
        </div>
        <div style="display:flex; justify-content: center; align-items: center; background-color: rgb(11, 11, 11); height:100%; width:40%;">
            {{-- class="d-flex flex-column align-self-center" --}}
            <form class="text-white" action="{{route('login.post')}}" method="POST">
                @csrf
                <div class="row mb-3" style="text-align: center">
                    <h2>LOGIN</h2>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-form-label">Email Address</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Has to end with '@gmail.com'">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-form-label">Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Minimum 5 characters, Maximum 255 characters">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-check" style="margin-left: 12px">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="checkbox">
                        <label class="form-check-label" for="gridCheck1">
                            Remember me
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <button type="submit" class="btn btn-primary col-sm-11 bg-dark" style="margin-left: 15px">Sign in</button>
                </div>
                <div class="row mb-3" style="text-align: center">
                    <div>
                        <span>Don't have an account?</span>
                        <a href="{{route('register')}}" style="text-decoration: none; color: yellow">Sign Up</a>
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
