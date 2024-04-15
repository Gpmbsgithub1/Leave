<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

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

    use AuthenticatesUsers {
    logout as performLogout;
}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   //protected $redirectTo = '/home';
    protected function redirectTo()
    {
        // $profile = Profile::where('user_id', '=', Auth::user()->id)->first();
        // $company = Company::where('user_id', '=', Auth::user()->id)->first();
        if(Auth::user()->hr == 1 && Auth::user()->status=='1') {
            return route('hr.home');
        }
        elseif (Auth::user()->hr == 0 && Auth::user()->status=='1') {
            return route('employee.home');
        }
    }

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = 'employee_id';
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    public function logout(Request $request)
{
    $this->performLogout($request);
    return redirect()->route('login');
}
}
