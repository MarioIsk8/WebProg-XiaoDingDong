<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // REGISTER
    public function register(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email', 'regex:/@gmail\.com$/', Rule::unique('users', 'email')],
            'username' => ['required', 'min:5', 'max:50'],
            'password' => ['required', 'min:5', 'max:255'],
            'confirm_password' => ['required', 'same:password'],
        ], [
            'email.regex' => 'Email has to end with "@gmail.com"',
            'email.unique' => 'This email address is already in use.',
            'confirm_password.same' => 'The password confirmation does not match.',
        ]);

        // User::create($credentials);
        $user = new User($credentials);
        $user->role = 'user';
        $user->name = $credentials['username'];
        $user->password = bcrypt($credentials['password']);
        $user->save();
        return redirect()->route('login');
    }

    // LOGIN
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email','regex:/@gmail\.com$/'],
            'password' => ['required','min:5', 'max:255'],
        ]);

        $remember = $request->boolean('checkbox');

        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput(['email', 'password']);
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function edit()
    {
        if(Auth::check() && auth()->user()){
            $user = User::where('id', auth()->user()->id)->get();
            return view('profile', ['user' => $user]);
        }
        else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:5|max:50',
            'email' => ['required', 'email', 'regex:/@gmail\.com$/'],
            'phone' => 'nullable|size:12',
            'address' => 'nullable|min:5',
            'current_password' => [
                'required',
                'string',
                'alpha_num',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => 'nullable|min:5|max:255',
            'confirm_new_password' => 'nullable|min:5|same:new_password',
            'berkas' => 'nullable|file|mimes:jpg,png,jpeg',
        ]);

        $uploadedFile = $request->file('berkas');
        $originalFileName = $uploadedFile->getClientOriginalName();
        $fileNameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME);
        $extension = $uploadedFile->getClientOriginalExtension();
        $uniqueFileName = $fileNameWithoutExtension . '-' . str::uuid() . '.' . $extension;
        $uploadedFile->move(public_path('user/'), $uniqueFileName);

        $pass=$request->current_password;
        if ($request->has('new_password') && $request->filled('new_password')) {
            $pass = $request->new_password;
        }

        $user = User::find(auth()->user()->id);

        $user = User::find(auth()->user()->id);
        $user->name = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($pass);
        $user->berkas = $uniqueFileName;
        $user->save();
        // $user->update([
        //     'name' => $request->username,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'new_password' => bcrypt($pass),
        //     'berkas' => $uniqueFileName
        // ]);

        $message = 'Data has been updated successfully';

        return redirect()->route('home')->with('success', $message);
    }



}
