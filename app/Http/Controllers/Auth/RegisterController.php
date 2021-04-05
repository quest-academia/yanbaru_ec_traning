<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'password' => ['required', 'string', 'min:6', 'max:15', 'confirmed'],
            'last_name' => ['required', 'string', 'max:10'],
            'first_name' => ['required', 'string', 'max:10'],
            'zipcode' => ['required', 'numeric', 'digits_between:1,7'],
            'prefecture' => ['required', 'string', 'max:5'],
            'municipality' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:15'],
            'apartments' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'unique:users','email'], 
            'phone_number' => ['required', 'numeric', 'digits_between:1,11'],
        ]);
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
            'password' => bcrypt($data['password']),
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'zipcode' => $data['zipcode'],
            'prefecture' => $data['prefecture'],
            'municipality' => $data['municipality'],
            'address' => $data['address'],
            'apartments' => $data['apartments'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'user_classification_id' => 2,
        ]);
    }
}
