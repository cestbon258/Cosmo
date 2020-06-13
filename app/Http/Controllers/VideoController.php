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

class VideoController extends Controller
{
    public function video (Request $request)
    {
        $data = DB::table('video')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        foreach ($data as $key => $value) {
            if ($value->video) {
                $value->video = json_decode($value->video);
            }
        }

        // echo '<pre>'.print_r($data, 1).'</pre>';

        return View::make('pages/video')->with(array("data"=>$data));
    }

    public function create_video (Request $request)
    {
        $method = $request->method();
        if ($request->isMethod('get')) {
            return View::make('pages/create-video');
        } else {

            ini_set('memory_limit','256M');

            // video files validation (size)
            $this->validate($request, [
                'videos.*' => 'required|max:20480',
            ]);

            $video_code = md5(str_random(6) . time());

            $videoArray = [];
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $key => $video) {

                    // $name = md5($video->getClientOriginalName() . time());
                    $name = str_random(6);


                    $fileName   = $name . '.' . $video->getClientOriginalExtension();

                    Storage::disk('public')->put('videos/'.$video_code.'/'.$fileName, file_get_contents($video));
                    $videoArray[] = $fileName; // temp array to store name of videos
                }
            }


            DB::table('video')
                ->insert(
                    [
                        'video_code'   => $video_code,
                        'developer'    => $_POST['developer'],
                        'video'        => json_encode($videoArray),
                    ]);

            Session::flash('status', 'Video has been created successful!');
            Session::flash('alert-class', 'alert-success');

            return back();
            // echo '<pre>'.print_r($_POST, 1).'</pre>';
        }

    }

    public function edit_video($locale, $videoCode)
    {

        $data = DB::table('video')
            ->where('video_code', $videoCode)
            ->first();

        if ($data->video) {
            $data->video = json_decode($data->video);
        }

        // echo '<pre>'.print_r($data, 1).'</pre>';

        return View::make('pages/edit-video')->with(array('data' => $data));

    }



    public function update_video (Request $request)
    {
        ini_set('memory_limit','256M');
        // echo '<pre>'.print_r($request->all(), 1).'</pre>';


        $videoCode = $request->videoCode;

        $data = DB::table('video')
            ->select('video')
            ->where('video_code', $videoCode)
            ->first();

        if ( !empty($data->video) ){
            $tempVideoArray = json_decode($data->video);
        }

        $videoArray = [];

        // check origin videos
        if ( !empty($_POST['originVideos']) ) {
            // compare with video
            $result = array_diff($tempVideoArray, $_POST['originVideos']);

            // delete video
            if( !empty($result) ){
                foreach ($result as $key => $video) {
                    Storage::disk('public')->delete('videos/'.$videoCode.'/'.$video);
                }
            }

            // video to be stored into database
            foreach ($_POST['originVideos'] as $key => $video) {
                $videoArray[] = $video;
            }
        } else {
            if ( !empty($tempVideoArray) ){
                foreach ($tempVideoArray as $key => $video) {
                    Storage::disk('public')->delete('videos/'.$videoCode.'/'.$video);
                }
            }
        }


        // check new videos upload
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $key => $video) {

                $name = str_random(6);

                $fileName   = $name . '.' . $video->getClientOriginalExtension();

                Storage::disk('public')->put('videos/'.$videoCode.'/'.$fileName, file_get_contents($video));

                $videoArray[] = $fileName; // temp array to store name of videos
            }
        }

        $videoJson = !empty($videoArray) ? json_encode($videoArray) : null;


        DB::table('video')
            ->where('video_code', $videoCode)
            ->update(
                [
                    'developer'  => $request->developer,
                    'video'      => $videoJson,
                ]);

        Session::flash('status', 'Video has been created successful!');
        Session::flash('alert-class', 'alert-success');

        return back();



    }


    public function video_list()
    {
        $data = DB::table('video')
            ->get();

        // echo '<pre>'.print_r($data, 1).'</pre>';

        return View::make('pages/video-list')->with(array("data"=>$data));
    }

    public function publish_video()
    {

        $status = ($_POST['publish']==0) ? 1 : 0;

        DB::table('video')
            ->where('video_code', $_POST['videoCode'])
            ->update([
                'status' => $status,
            ]);

        Session::flash('status', 'Video has been published! ');
        Session::flash('alert-class', 'alert-success');

        return back();
    }

    public function delete_video()
    {

        $user = Auth::user();
        if ( Auth::check() ){

            DB::table('video')
                ->where('video_code', $_POST['video'])
                ->delete();

            Storage::disk('public')->deleteDirectory('videos/'.$_POST['video']);
        }

        Session::flash('status', 'The video has been deleted');
        Session::flash('alert-class', 'alert-success');

        return back();

    }

}
