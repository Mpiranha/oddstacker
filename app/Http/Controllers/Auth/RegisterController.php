<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\AddNewUser;

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
    protected $redirectTo = '/home';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'min:4', 'alpha_dash', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'tel' => ['required', 'min:8', 'max:14'],
            'gender' => ['required', 'in:none,male,female'],
            'country' => ['required'],
            'state' => ['required'],
            'terms' => ['required', 'accepted']
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
        $has_referal_code = $data['referalcode'];
        
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $wallet = Wallet::create([
            'user_id' => $user->id
        ]);
        $new_user = $user;
        if ($has_referal_code) {
            $referal_user_name = $has_referal_code;
            event(new AddNewUser($referal_user_name, $new_user));
        }

        return $user;
    }
}
