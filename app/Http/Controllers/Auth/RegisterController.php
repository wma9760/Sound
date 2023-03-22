<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\{Country};
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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobileNo' => ['required', 'numeric', 'min:11'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255' ],
            'country_id' => ['required', 'string'],
            'userimage' =>['required','mimes:jpeg,png,jpg,gif,svg'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     * 
     */
    public function showRegistrationForm()
{
    $countries = Country::all();
    return view('auth.register', compact('countries'));
}
    protected function create(array $data)
    {
        $req = request();
        if($req->hasfile('userimage'))
        {
            $file = $req->file('userimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('frontend/images/users', $filename);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'DOB' => $data['DOB'],
            'gender' => $data['gender'],
            'mobileNo' => $data['mobileNo'],
            'address' => $data['address'],
            'country_id' => $data['country_id'],
            'userimage' => $filename,

        ]);
    }
}
