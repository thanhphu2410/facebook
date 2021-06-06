<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
        session()->put('registering', true);
        $messages = [
            'required' => 'Vui lòng nhập :attribute.',
            'regex' => 'Mật khẩu phải từ 6-15 ký tự vừa hoa, vừa số vừa chữ thường.',
            'confirmed' => 'Mật khẩu phải nhập giống nhau'
        ];
        $customAttributes = [
            'last_name' => 'họ',
            'first_name' => 'tên',
            'gender' => 'giới tính',
            'password' => 'mật khẩu'
        ];
        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'day' => ['required', 'numeric'],
            'month' => ['required', 'numeric'],
            'year' => ['required', 'numeric'],
            'gender' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:15', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])/', 'confirmed'],
        ], $messages, $customAttributes);
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
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'date_of_birth' => $data['day'].'-'.$data['month'].'-'.$data['year'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
