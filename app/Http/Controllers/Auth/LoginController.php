<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    }
    
    protected function validateLogin(Request $data)
    {
    $this->validate($data, [
            $this->username()  => 'required', 
            'password'              => 'required'
        ],[
            'request' => 'O campo :attribute é obrigatório'
        ],[
            $this->username()  => 'E-mail',
            'password'              => 'Senha',
        ]
    );
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function logout_log(Request $request, $id) {
        Auth::logout();
        return redirect('/login');
    }
}
