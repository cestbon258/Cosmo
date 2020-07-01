<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // protected function sendResetLinkFailedResponse(Request $request, $response)
    // {
    //     return back()->withErrors(
    //         ['email' => trans($response)]
    //     )->withInput($request->only('email'));
    // }
    //
    public function showResetForm(Request $request, $locale, $token)
    {
        // dd($request->email);
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
            // ['token' => $token, 'email' => decrypt($request->email)]
        );
    }
}
