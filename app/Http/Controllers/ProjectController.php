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
            // echo '<pre>'.print_r($string, 1).'</pre>';
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

            DB::table('houses')
            ->insert(
                    [
                        'user_id'       => $user->id,
                        'property_code' => $property_code,
                        'title'         => $_POST['title'],
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


}
