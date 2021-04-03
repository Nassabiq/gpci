<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        //Error messages
        $user = User::where('email', '=', $request->input('email'))->first();
        $messages = [
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 6 characters"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            // attempt to log
            if (Hash::check($request->password, $user->password)) {
                if (Auth::attempt(['status' => 1, 'email' => $request->email, 'password' => $request->password ])) {
                // if successful -> redirect forward
                    return redirect()->intended('/home');
                } else {
                // if unsuccessful -> redirect back
                    return redirect()->back()->withInput($request->only('email'))->withErrors([
                        'status' => 'Akun belum disetujui, Silahkan Hubungi Kontak yang tersedia untuk melakukan aktivasi'
                    ]);
                }
            } else{
                return redirect()->back()->withInput($request->only('email'))->withErrors([
                    'password' => 'Password Salah'
                ]);
            }
        }
    }
}
