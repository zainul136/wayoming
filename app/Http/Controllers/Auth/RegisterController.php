<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function register(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ],
        );

        //check user already exist
        $check_user = User::where('email', $request->email)->first();

        if (!$check_user) {
            $res = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => 0,
                'password' => Hash::make($request->password),
            ]);

            if ($res) {

                if ($request['current_url'] == 'register-agent') {
                    return redirect($request['current_url'])->with('success_message', 'You are successfully registered please signin your account to proceed further
                    ');
                } elseif ($request['current_url'] == 'register-corporation') {
                    return redirect($request['current_url'])->with('success_message', 'You are successfully registered please signin your account to proceed further
                    ');
                } elseif ($request['current_url'] == 'register-agent-renewal') {
                    return redirect($request['current_url'])->with('success_message', 'You are successfully registered please signin your account to proceed further
                    ');
                } elseif (auth()->user()->is_admin == 1) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('client.dashboard');
                }
            } else {

                if ($request['current_url'] == 'register-agent' || $request['current_url'] == 'register-corporation' || $request['current_url'] == 'register-agent-renewal') {
                    return redirect($request['current_url'])->with('error_message', 'Authentication Failed. Email or Password Is Invalid.');
                } else {
                    return redirect()->route('login')
                        ->with('error', 'Authentication Failed. Email or Password Is Invalid.');
                }
            }
        } else {
            return redirect($request['current_url'])->with('error_message', 'Already Registered please signin');
        }
    }
}
