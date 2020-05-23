<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;
use Session;
use DB;
use Redirect;
use Hash;
use Storage;
use Image;
use Mail;

// use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function all_user(Request $request)
    {

        // With Query String...
        $allParams = $request->all();
        $tabParam = $request->tab;

        // query
        $query = DB::table('users')
            ->select('name', 'email', 'updated_at', 'email_verified_at', 'role', 'active_status', 'phone_no');

        // active users
        if($tabParam == 3) {
            $query->where('active_status', 1);
            $users = $query->get();
            // echo '<pre>'.print_r($users, 1).'</pre>';
            return View::make('pages/existing-user')->with(array('users' => $users));
        }

        // inactive users
        if($tabParam == 2) {
            $query->where('active_status', 2);
            $users = $query->get();
            // echo '<pre>'.print_r($users, 1).'</pre>';
            return View::make('pages/inactive-user')->with(array('users' => $users));
        }

        // new users
        if($tabParam == "" || $tabParam == 1) {
            $query->where('active_status', 0);
            $users = $query->get();
            // echo '<pre>'.print_r($users, 1).'</pre>';
            return View::make('pages/new-user')->with(array('users' => $users));
        }

        // echo '<pre>'.print_r($tabParam, 1).'</pre>';

    }

    public function update_status ()
    {
        if ($_POST['to'] == "approve") {
            $newStatus = 1;
        }

        if ($_POST['to'] == "active") {
            $newStatus = 1;
        }

        if ($_POST['to'] == "deactive") {
            $newStatus = 2;
        }

        if ( Auth::check() ){

            DB::table('users')
                ->where('email', $_POST['email'])
                ->update([
                    'active_status' => $newStatus
                ]);

            // send email to user if approval
            if ($_POST['to'] == "approve") {

                $userName = $_POST['name'];
                $userEmail = $_POST['email'];

                $data = array(
                    'email' => $userEmail,
                    'name' => $userName
                );

                $emailArray = array(
                    'cestbon258@gmail.com',
                    'angelo@icosmo.co',
                    'stephen@icosmo.co'
                );


                foreach ($emailArray as $email) {
                    // Mail::send([], [], function($message) use($html, $data) {
                    Mail::send('user-approval', $data, function($message) use($data, $email) {
                        $message->to($email)->subject
                            ('Cosmo - Global Real Estate');
                        $message->from('admin@icosmo.co', 'Cosmo');
                        // $message->setBody($html, 'text/html' ); // dont miss the '<html></html>' or your spam score will increase !
                    });
                }

            }

        }

        Session::flash('status', 'The user has been updated');
        Session::flash('alert-class', 'alert-success');

        return back();
    }


    public function delete_user ()
    {

        if ( Auth::check() ){

            DB::table('users')
                ->where('email', $_POST['email'])
                ->delete();
        }

        Session::flash('status', 'The user has been deleted');
        Session::flash('alert-class', 'alert-success');

        return back();
    }

}
