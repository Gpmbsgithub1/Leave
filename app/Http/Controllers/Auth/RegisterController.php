<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $messages = [
            'email.cmail' => 'Please enter company Email.', 
            'employee_id.unique' => 'Already registered with this Employee ID.',
            'phone.without_spaces' => 'Please enter your 10 digit phone number without spaces.',
            'password.regex' => 'Password must contain atleast one special character,number and character.'
           ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50','regex:/^[a-zA-Z\s]+$/u'],
            'company' => ['required', 'string', 'max:50'],
            'employee_id' => ['required', 'string', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'cmail', 'max:255', 'unique:users'],
            'phone' => ['required', 'without_spaces', 'regex:/^(?!0+$)\d{10,}$/', 'min:10', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/'],
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'company' => $data['company'],
            'employee_id' => $data['employee_id'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        $user->hr = 1;
        $user->save();

        if($request->input('company')!=''){
            $cmp = Company::first();
            $user->cmp = $cmp->id;
            $user->save();
        }

        if($user->hr == 0){
           Auth::loginUsingId($user->id);
        return redirect()->route('employee.home')->with('success','Welcome '.Auth::user()->name.'. You have registered successfully!!');
        }elseif ($user->hr == 1){
           Auth::loginUsingId($user->id);
        return redirect()->route('hr.home')->with('success','Welcome '.Auth::user()->name.'. You have registered successfully!!');
        }

    }
}
