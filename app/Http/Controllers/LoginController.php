<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username = 'username';
    protected $redirectTo = '/dashboard';
    protected $guard = 'web';

    public function getLogin() {
        if(Auth::guard('web')->check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function postLogin(Request $request) {
        $auth = Auth::guard('web')->attempt(
            [
                'name' => $request->name,
                'password' => $request->password,
                'active' => 1
            ]
        );

        if($auth == true) {

            return redirect()->route('/'); //login
        }
        else if($auth == false) {
            echo "Login false";
        }

    }

    public function getLogout() {
        Auth::guard('web')->logout();
        return redirect()->route('/');
    }

    public function noPermission() {
        return view('nopermission');
    }

    public function createUser() {
        echo "This is a module for admin role";
    }

}
