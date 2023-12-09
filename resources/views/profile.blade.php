@extends('../components/master')

@section('title','XIAO DING DONG | HOME')

@section('content')
<style>
    form{
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .right-container{
        margin-left: 10px;
        width: 80%;
    }

    .left-container{
        margin-right: 10px;
        width: 80%;
    }

    .container{
        margin-right: 10px;
        width: 100%;
    }

    label{
        background-color: black;
        color: gold;
    }
</style>

<form method="POST" action="{{route('user.edit')}}" enctype="multipart/form-data">
    @csrf

    <h2 style="color:gold; font-weight:bold; background-color:black; text-align:center;">编辑个人资料 | Edit Profile</h2>

    <div class="form-group container">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required minlength="5" placeholder="Minimum 5 Characters">
        {{-- @if ($errors->any())
            <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                <ul class="list-unstyled">
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif --}}
    </div>

    <br>

    <div class="form-group container">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required placeholder="Must be end with '@gmail.com'">
        {{-- @if ($errors->any())
            <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                <ul class="list-unstyled">
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif --}}
    </div>

    <br>

    <div class="form-group container">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" size="12" placeholder="Must Contains 12 Numbers">
        {{-- @if ($errors->any())
            <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                <ul class="list-unstyled">
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif --}}
    </div>

    <br>

    <div class="form-group container">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" min="5" placeholder="Do not have to be filled, Minimum 5 Characters">
        {{-- @if ($errors->any())
            <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                <ul class="list-unstyled">
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif --}}
    </div>

    <br>

    <div class="form-group container">
        <label for="password">Current Password</label>
        <input type="password" class="form-control" id="password" name="current_password" placeholder="Has to be the same with the previous password">
        {{-- @if ($errors->any())
            <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                <ul class="list-unstyled">
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif --}}
    </div>

    <br>

    <div class="form-group container">
        <label for="new_password">New Password</label>
        <input type="password" class="form-control" id="new_password" name="new_password" minlength="5" maxlength="255" placeholder="Do not have to be filled">
        {{-- @if ($errors->any())
            <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                <ul class="list-unstyled">
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif --}}
    </div>

    <br>

    <div class="form-group container">
        <label for="confirm_new_password">Confirm New Password</label>
        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" minlength="5" placeholder="Do not have to be filled">
        {{-- @if ($errors->any())
            <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                <ul class="list-unstyled">
                    <li>{{ $errors->first() }}</li>
                </ul>
            </div>
        @endif --}}
    </div>

    <br>

    <div class="form-group container">
        <label for="berkas">Profile Picture</label>
        <input type="file" class="form-control-file" id="berkas" name="berkas" style="background-color: white; width: 100%" required>

    </div>

    <br>

    <div style="display: flex; justify-content:flex-end">
        <button type="submit" class="btn btn-primary" style="text-align: center; background-color: black; color:gold; border:black; margin-right: 5px;">Update Profile</button>
    </div>
    {{-- @if ($errors->any())
        <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
            <ul class="list-unstyled">
                <li>{{ $errors->first() }}</li>
            </ul>
        </div>
    @endif --}}
    {{-- @if(session('success'))
        <div id="success-message" class="alert alert-success position-fixed top-0 start-50 translate-middle-x">
            {{ session('success') }}
        </div>
    @endif --}}

</form>

@endsection



{{--
    public function edit($id)
    {
        $user = Food::where('id', $id)->get();

        return view('profile', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'username' => 'required|min:5|max:50',
            'email' => ['requried', 'email', 'regex:/@gmail\.com$/],
            'phone' => 'nullable|size:12',
            'address' => 'nullable|min:5',
            'password' => 'required_with:new_password|same:current_password',
            'new_password' => 'nullable|min:5|max:255',
            'confirm_new_password' => 'nullable|min:5|same:new_password',
            'berkas' => 'nullable|file|image'
        ]);

        Food::where('id', $request->id)->update($validateData);

        return redirect()->route('home')->with('success', $message);
    }

    Route::get('/profile/{id}/edit', [UserController::class, 'edit']);
    Route::post('/profile/edit', [UserController::class, 'update'])->name('user.edit');

  --}}
