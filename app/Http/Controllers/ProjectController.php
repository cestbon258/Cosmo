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

class ProjectController extends Controller
{



    public function create_project(Request $request)
    {

        $method = $request->method();
        if ($request->isMethod('get')) {
            $districts = DB::table('districts')
                ->get();

            foreach ($districts as $key => $district) {
                $district->city = json_decode($district->city);
            }

            return View::make('pages/create-project')->with(array("districts"=>$districts));
        }

        if ($request->isMethod('post')) {

            $user = Auth::user();

            ini_set('memory_limit','256M');

            // image file validation (file format)
            $this->validate($request, [
                'houseImg.*' => 'image|mimes:jpeg,png,jpg'
                // 'houseImg.*' => 'required|image|mimes:jpeg,png,jpg'
            ]);
            // video files validation (size)
            $this->validate($request, [
                'videos.*' => 'max:20480',
                // 'videos.*' => 'required|max:20480',
            ]);

            $property_code = str_random(128); // random string, used for project id
            // $property_code = md5($string . time()); // image foloder name and project id

            // echo '<pre>'.print_r($_POST, 1).'</pre>';
            $imgArray = [];
            if ($request->hasFile('houseImg')) {
                foreach ($request->file('houseImg') as $key => $image) {

                    $name = md5($image->getClientOriginalName() . time());
                    // $image      = $request->file('houseImg');
                    $fileName   = $name . '.' . $image->getClientOriginalExtension();


                    $img = Image::make($image->getRealPath());

                    $img->resize(1000, 724);
                    $img->stream(); // <-- Key point

                    Storage::disk('public')->put('projects/'.$property_code.'/'.$fileName, $img);

                    // should have thumbnails
                    $thumb = Image::make($image->getRealPath());
                    $thumb->resize(350, 250);
                    $thumb->stream(); // <-- Key point

                    Storage::disk('public')->put('projects/'.$property_code.'/thumbnails'.'/'.$fileName, $thumb);
                    $imgArray[] = $fileName; // temp array to store name of images
                }
            }

            $videoArray = [];
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $key => $video) {

                    // $name = md5($video->getClientOriginalName() . time());
                    $name = str_random(6);


                    $fileName   = $name . '.' . $video->getClientOriginalExtension();

                    Storage::disk('public')->put('projects/'.$property_code.'/videos'.'/'.$fileName, file_get_contents($video));
                    $videoArray[] = $fileName; // temp array to store name of videos
                }
            }

            $pdfArray = [];
            if ($request->hasFile('PDFs')) {
                foreach ($request->file('PDFs') as $key => $pdf) {

                    // $name = md5($pdf->getClientOriginalName() . time());
                    $name = str_random(6);

                    $fileName   = $name . '.' . $pdf->getClientOriginalExtension();

                    Storage::disk('public')->put('projects/'.$property_code.'/pdf'.'/'.$fileName, file_get_contents($pdf));
                    $pdfArray[] = $fileName; // temp array to store name of videos
                }
            }

            // // convert to date
            // $date = date_create($_POST['time']);
            // $newDate= date_format($date,"Y-m-d");;

            // get country and city from district
            $district = $_POST['district'];
            $districtArray = explode ("|", $district);

            $facilities = !empty($_POST['facilities']) ? json_encode($_POST['facilities']) : null;

            DB::table('houses')
            ->insert(
                    [
                        'user_id'       => $user->id,
                        'property_code' => $property_code,
                        'title'         => $_POST['title'],
                        'carpark'       => $_POST['carpark'],
                        'facilities'    => $facilities,
                        'features'     => json_encode($_POST['features']),
                        'country'      => $districtArray[1],
                        'city'         => $districtArray[0],
                        'address'      => $_POST['address'],
                        'pictures'     => json_encode($imgArray),
                        'videos'       => json_encode($videoArray),
                        'files'        => json_encode($pdfArray),
                        'description'  => json_encode($_POST['description']),
                        'project_type' => 2,
                    ]
                );

            Session::flash('status', 'Project has been created successful!');
            Session::flash('alert-class', 'alert-success');
            return back();
        }

    }


    public function edit_project($locale, $propertyCode)
    {
        $user = Auth::user();

        $districts = DB::table('districts')
            ->get();


        foreach ($districts as $key => $district) {
            $district->city = json_decode($district->city);
        }


        $myProperty = DB::table('houses')
            ->where('property_code', $propertyCode)
            ->first();

        if ($myProperty->time) {
            $dateValue = $myProperty->time;
            $time=strtotime($dateValue);
            $temp=date("Y-m",$time);
            $myProperty->time = $temp;
        }

        $myProperty->facilities = json_decode($myProperty->facilities);
        $myProperty->features = json_decode($myProperty->features);
        $myProperty->description = json_decode($myProperty->description);
        $myProperty->pictures = json_decode($myProperty->pictures);
        $myProperty->videos = json_decode($myProperty->videos);
        $myProperty->files = json_decode($myProperty->files);

        // echo '<pre>'.print_r($myProperty, 1).'</pre>';

        return View::make('pages/edit-project')->with(array('user' => $user, 'districts' => $districts, "property"=>$myProperty));
    }

    public function delete_project()
    {
        $user = Auth::user();
        if ( Auth::check() ){

            DB::table('houses')
                ->where('property_code', $_POST['property'])
                ->where('user_id', $user->id)
                ->delete();

            Storage::disk('public')->deleteDirectory('projects/'.$_POST['property']);
        }

        return redirect('property-list')->with('status', 'The project has been deleted');

    }


    public function update_project(Request $request, $locale, $propertyCode)
    {
        $user = Auth::user();

        ini_set('memory_limit','256M');

        // get json from database
        $data = DB::table('houses')
            ->select('pictures', 'videos', 'files')
            ->where('property_code', $propertyCode)
            ->first();

        if ( !empty($data->pictures) ){
            $picArray = json_decode($data->pictures);
        }

        if ( !empty($data->videos) ){
            $tempVideoArray = json_decode($data->videos);
        }

        if ( !empty($data->files) ){
            $fileArray = json_decode($data->files);
        }

        // new array
        $imgArray = [];
        $videoArray = [];
        $pdfArray = [];


        // check origin images
        if ( !empty($_POST['originImg']) ) {
            // compare with pictures
            $result = array_diff($picArray, $_POST['originImg']);

            // delete images
            if( !empty($result) ){
                foreach ($result as $key => $img) {
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/'.$img);
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/thumbnails'.'/'.$img);
                }
            }

            // image to be stored into database
            foreach ($_POST['originImg'] as $key => $img) {
                $imgArray[] = $img;
            }

        } else {
            if ( !empty($picArray) ){
                foreach ($picArray as $key => $img) {
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/'.$img);
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/thumbnails'.'/'.$img);
                }
            }
        }

        // check origin videos
        if ( !empty($_POST['originVideos']) ) {
            // compare with video
            $result = array_diff($tempVideoArray, $_POST['originVideos']);

            // delete video
            if( !empty($result) ){
                foreach ($result as $key => $video) {
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/videos'.'/'.$video);
                }
            }

            // video to be stored into database
            foreach ($_POST['originVideos'] as $key => $video) {
                $videoArray[] = $video;
            }
        } else {
            if ( !empty($tempVideoArray) ){
                foreach ($tempVideoArray as $key => $video) {
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/videos'.'/'.$video);
                }
            }
        }

        // check origin PDFs
        if ( !empty($_POST['originPDFs']) ) {
            // compare with pdf
            $result = array_diff($fileArray, $_POST['originPDFs']);

            // delete pdf
            if( !empty($result) ){
                foreach ($result as $key => $pdf) {
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/pdf'.'/'.$pdf);
                }
            }

            // pdf to be stored into database
            foreach ($_POST['originPDFs'] as $key => $pdf) {
                $pdfArray[] = $pdf;
            }
        } else {
            if ( !empty($fileArray) ){
                foreach ($fileArray as $key => $pdf) {
                    Storage::disk('public')->delete('projects/'.$propertyCode.'/pdf'.'/'.$pdf);
                }
            }
        }



        // check new images upload
        if ($request->hasFile('houseImg')) {
            foreach ($request->file('houseImg') as $key => $image) {

                $name = md5($image->getClientOriginalName() . time());
                $fileName   = $name . '.' . $image->getClientOriginalExtension();

                $img = Image::make($image->getRealPath());
                $img->resize(1000, 724);
                $img->stream(); // <-- Key point

                Storage::disk('public')->put('projects/'.$propertyCode.'/'.$fileName, $img);

                // thumbnails
                $thumb = Image::make($image->getRealPath());
                $thumb->resize(550, 350);
                $thumb->stream(); // <-- Key point

                Storage::disk('public')->put('projects/'.$propertyCode.'/thumbnails'.'/'.$fileName, $thumb);
                $imgArray[] = $fileName; // temp array to store name of images
            }
        }

        // check new videos upload
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $key => $video) {

                // $name = md5($video->getClientOriginalName() . time());
                $name = str_random(6);


                $fileName   = $name . '.' . $video->getClientOriginalExtension();

                Storage::disk('public')->put('projects/'.$propertyCode.'/videos'.'/'.$fileName, file_get_contents($video));
                $videoArray[] = $fileName; // temp array to store name of videos
            }
        }

        // check new PDFs upload
        if ($request->hasFile('PDFs')) {
            foreach ($request->file('PDFs') as $key => $pdf) {

                // $name = md5($pdf->getClientOriginalName() . time());
                $name = str_random(6);

                $fileName   = $name . '.' . $pdf->getClientOriginalExtension();

                Storage::disk('public')->put('projects/'.$propertyCode.'/pdf'.'/'.$fileName, file_get_contents($pdf));
                $pdfArray[] = $fileName; // temp array to store name of videos
            }
        }


        if ( empty($imgArray) ) {
            Session::flash('status', 'Opps! Please upload at least one picture!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }


        // // convert to date
        // if ($_POST['time']) {
        //     $date = date_create($_POST['time']);
        //     $newDate = date_format($date,"Y-m-d");;
        // } else {
        //     $newDate = null;
        // }


        // get country and city from district
        $district = $_POST['district'];
        $districtArray = explode ("|", $district);

        $imgJson = !empty($imgArray) ? json_encode($imgArray) : null;
        $videoJson = !empty($videoArray) ? json_encode($videoArray) : null;
        $pdfJson = !empty($pdfArray) ? json_encode($pdfArray) : null;
        $facilities = !empty($_POST['facilities']) ? json_encode($_POST['facilities']) : null;

        DB::table('houses')
            ->where('property_code', $propertyCode)
            ->update(
                [
                    'title'        => $_POST['title'],
                    'carpark'      => $_POST['carpark'],
                    'facilities'   => $facilities,
                    'features'     => json_encode($_POST['features']),
                    'country'      => $districtArray[1],
                    'city'         => $districtArray[0],
                    'address'      => $_POST['address'],
                    'pictures'     => $imgJson,
                    'videos'       => $videoJson,
                    'files'        => $pdfJson,
                    'description'  => json_encode($_POST['description'])
                ]
            );


        Session::flash('status', 'Project has been updated! ');
        Session::flash('alert-class', 'alert-success');

        return back();

        // echo '<pre>'.print_r($request->file('videos'), 1).'</pre>';
        // echo '<pre>'.print_r($_POST, 1).'</pre>';
    }



}
