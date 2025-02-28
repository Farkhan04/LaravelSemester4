<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username'=> 'required|string', //validasi kolom komentar
            //tapi kolom bisa berisi email atau username
            'password'=> 'required|string|min:6'
        ]);

        //pengecekan jika inputan dari username formatnya adalah email
        //maka kita melakukan proses authentication menggunakan email, selain itu menggunakan email
        $loginType=filter_var($request->username, FILTER_VALIDATE_EMAIL)?'email' : 'username';

        $login=[
            $loginType=>$request->username,
            'password'=>$request->password
        ];

        //lakukan login
        if(auth()->attempt($login)){
            return redirect()->route('home');
        }
        return redirect()->route('login')->with(['error'=>'Email/Password salah!']);
    }
}