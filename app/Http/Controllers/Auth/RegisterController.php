<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
        $validator = Validator::make($data, [
            'name' => 'required|string|max:20|min:4',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'captcha' => 'required|captcha'
        ],[
            'name.max'=>'昵称长度请保持在4到20个字符之间。',
            'name.min'=>'昵称长度请保持在4到20个字符之间。',
            'name.required'=>'请填写昵称。',
            'email.required'=>'请填写邮箱。',
            'email.email'=>'请填写正确的邮箱。',
            'email.max'=>'邮箱长度请不要超过255个字符',
            'email.unique' => '该邮箱已被占用。',
            'password.confirmed'  => '【确认密码】应与【密码】一致。',
            'password.required'=>'请填写密码。',
            'password.min'=>'密码请至少包含6个字符。',
            'captcha.required' => '请正确填写验证码。',
            'captcha' =>'请正确填写验证码。'
        ]);
        return $validator;
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
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
