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
// use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function all_user(Request $request)
    {

        // With Query String...
        $allParams = $request->all();
        $tabParam = $request->tab;


        if($tabParam == 3) {
            $users = DB::table('users')
                ->select('name', 'email', 'updated_at', 'email_verified_at', 'role', 'active_status', 'phone_no')
                ->where('active_status', 1)
                ->get();

            // echo '<pre>'.print_r($users, 1).'</pre>';

            return View::make('pages/existing-user')->with(array('users' => $users));
        }


        if($tabParam == 2) {
            $users = DB::table('users')
                ->select('name', 'email', 'updated_at', 'email_verified_at', 'role', 'active_status', 'phone_no')
                ->where('active_status', 2)
                ->get();

            // echo '<pre>'.print_r($users, 1).'</pre>';

            return View::make('pages/inactive-user')->with(array('users' => $users));
        }


        if($tabParam == "" || $tabParam == 1) {
            $users = DB::table('users')
                ->select('name', 'email', 'updated_at', 'email_verified_at', 'role', 'active_status', 'phone_no')
                ->where('active_status', 0)
                ->get();

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
