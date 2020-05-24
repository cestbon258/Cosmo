<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Mail;
use Session;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/en';

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
        // echo '<pre>'.print_r($data, 1).'</pre>';
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'userType' => ['required'],
            'phoneNumber' => ['required', 'numeric', 'min:11'],
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
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        $role = 4; // default is Renter

        if ($data['userType'] == 'agent') {
            $role = 1;
        }
        if ($data['userType'] == 'landlord') {
            $role = 2;
        }

        if ($data['userType'] == 'investor') {
            $role = 3;
        }


        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_no' => $data['phoneNumber'],
            'estate_agent_phone' => $data['agentNumber'],
            'role' => $role,
        ]);



        $temp = array(
            'name' => $data['name'],
            'email' => $data['email'],
        );

        $emailArray = array(
            $data['email'],
            "angelo@icosmo.co",
            "stephen@icosmo.co",
        );

        // echo '<pre>'.print_r($data, 1).'</pre>';

        // $html = '<html><h1>5% off its awesome</h1><p>'.$data['name'].'Go get it now !</p></html>';

        foreach ($emailArray as $email) {
            // Mail::send([], [], function($message) use($html, $data) {
            Mail::send('mail', $temp, function($message) use($temp, $email) {
                $message->to($email)->subject
                    ('Cosmo - Global Real Estate');
                $message->from('admin@icosmo.co', 'Cosmo');
                // $message->setBody($html, 'text/html' ); // dont miss the '<html></html>' or your spam score will increase !
            });
        }

        return $user;
    }
    //
    // /**
    //  * Handle a registration request for the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        // Session::flash('status', 'Congratulations! Please check your email to activate your account.');
        // Session::flash('alert-class', 'alert-success');

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());

        // $this->registered($request, $user);

        // return back();
    }
}
