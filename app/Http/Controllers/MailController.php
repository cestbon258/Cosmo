<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

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
        echo '<pre>'.print_r($data, 1).'</pre>';

        $html = '<html><h1>5% off its awesome</h1><p>'.$data['message'].'Go get it now !</p></html>';
        // Mail::send([], [], function($message) use($html, $data) {
        Mail::send('mail', $data, function($message) use($data) {
            $message->to($data['email'], $data['name'])->subject
                ('Cosmos - Global Real Estate');
            $message->from('cestbon258@gmail.com', 'Cosmos');
            // $message->setBody($html, 'text/html' ); // dont miss the '<html></html>' or your spam score will increase !
        });
        echo "Basic Email Sent. Check your inbox.";

    }
}
