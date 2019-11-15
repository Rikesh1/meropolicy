<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Agent;
use App\Model\Merchant;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest:admin');
        $this->middleware('guest:merchant');
        $this->middleware('guest:agent');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.admin_register');
    }

    protected function adminRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->intended('/login/admin');
    }

    public function showMerchantRegisterForm()
    {
        return view('auth.merchant_register');
    }

    protected function merchantRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        Merchant::create([
            'company_name' => $request->company_name,
            'company_slug' => $request->company_slug,
            'company_phone' => $request->company_phone,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->intended('/login/merchant');
    }

    public function showAgentRegisterForm()
    {
        return view('auth.agent_register');
    }

    protected function agentRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        Agent::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->intended('/login/agent');
    }
}
