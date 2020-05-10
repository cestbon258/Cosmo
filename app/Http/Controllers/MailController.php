<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Session;
use App\User;
use Auth;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class MailController extends Controller
{
    public function contact_us()
    {
        // echo '<pre>'.print_r($_POST, 1).'</pre>';
        $data = array(
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'message'=>$_POST['message']
        );

        $emailArray = array(
            $_POST['email'],
            "angelo@icosmo.co",
            "stephen@icosmo.co"
        );

        // echo '<pre>'.print_r($emailArray, 1).'</pre>';

        $html = '<html><h1>5% off its awesome</h1><p>'.$data['message'].'Go get it now !</p></html>';

        foreach ($emailArray as $email) {
            // Mail::send([], [], function($message) use($html, $data) {
            Mail::send('mail', $data, function($message) use($data, $email) {
                $message->to($email)->subject
                    ('Cosmo - Global Real Estate');
                $message->from('admin@icosmo.co', 'Cosmo');
                // $message->setBody($html, 'text/html' ); // dont miss the '<html></html>' or your spam score will increase !
            });
        }

        Session::flash('status', 'Your email has been sent.');
        Session::flash('alert-class', 'alert-success');

        return back();
    }


    public function request_more(Request $request)
    {
        $user = Auth::user();

        $url = $request->propertyURL;

        $data = array(
            'url' => $url,
            'email' => $user->email,
            'phone' => $user->phone_no

        );

        $emailArray = array(
            'cestbon258@gmail.com',
            'angelo@icosmo.co',
            'stephen@icosmo.co'
        );


        foreach ($emailArray as $email) {
            // Mail::send([], [], function($message) use($html, $data) {
            Mail::send('more-info', $data, function($message) use($data, $email) {
                $message->to($email)->subject
                    ('Cosmo - Global Real Estate');
                $message->from('admin@icosmo.co', 'Cosmo');
                // $message->setBody($html, 'text/html' ); // dont miss the '<html></html>' or your spam score will increase !
            });
        }


        // echo '<pre>'.print_r($test, 1).'</pre>';

        // print_r($user->email);
        // return back();
        return response()->json(['url' => $url, 'user' => $user->email]);

    }



}
