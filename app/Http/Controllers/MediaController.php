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

class MediaController extends Controller
{

    public function create_media (Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('get')) {

            $data = DB::table('media')
                ->get();

            return View::make('pages/create-media')->with(array("data"=>$data));
        } else {

            // convert to date
            if ($_POST['time']) {
                $date = date_create($_POST['time']);
                $newDate= date_format($date,"Y-m-d");;
            } else {
                $newDate = null;
            }

            DB::table('media')
                ->insert(
                    [
                        'title'         => $_POST['title'],
                        'url'           => $_POST['url'],
                        'uploaded_date' => $newDate
                    ]);

            Session::flash('status', 'Media has been created successful!');
            Session::flash('alert-class', 'alert-success');

            return back();
            // echo '<pre>'.print_r($_POST, 1).'</pre>';
        }

    }

    public function update_media (Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('post')) {

            // convert to date
            if ($_POST['time']) {
                $date = date_create($_POST['time']);
                $newDate= date_format($date,"Y-m-d");;
            } else {
                $newDate = null;
            }

            // if delete
            if (isset($_POST['delete'])) {
                DB::table('media')
                    ->where('id', $_POST['mediaID'])
                    ->delete();
            } else {
                DB::table('media')
                    ->where('id', $_POST['mediaID'])
                    ->update(
                        [
                            'title'         => $_POST['title'],
                            'url'           => $_POST['url'],
                            'uploaded_date' => $newDate
                        ]);
            }

            Session::flash('status', 'Media has been created successful!');
            Session::flash('alert-class', 'alert-success');

            return back();
        }
    }


}
