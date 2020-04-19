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

class DataController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            if ($role == 4) {
                $allProperties = DB::table('houses')
                    ->where('purpose', 'rent')
                    ->where('status', 1)
                    ->orderBy('updated_at', 'desc')
                    ->get();
            } else {
                $allProperties = DB::table('houses')
                    ->where('status', 1)
                    ->orderBy('updated_at', 'desc')
                    ->get();
            }

        } else {
            $allProperties = DB::table('houses')
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        // get first image from json
        foreach ($allProperties as $key => $property) {
            $picArray = json_decode($property->pictures);
            $property->pictures = $picArray[0];
            if ($property->features) {
                $property->features = "";
            }
            if ($property->videos) {
                $property->videos = json_decode($property->videos);
            }
            if ($property->files) {
                $property->files = json_decode($property->files);
            }
            if ($property->description) {
                $description = json_decode($property->description);

                $property->description = substr(strip_tags($description), 0, 150);
            }
        }

        // echo '<pre>'.print_r($allProperties, 1).'</pre>';

        return View::make('pages/index')->with(array("properties"=>$allProperties));
    }

    public function profile()
    {

        // echo '<pre>'.print_r($user, 1).'</pre>';
        return View::make('profile');
        // return View::make('home')->with(array('user' => $user));
    }

    public function profile_update(Request $request)
    {
        $user = Auth::user();


        if($request->hasFile('profileImage')){
            $target_dir = storage_path();
            // convert original file name to new file name
            $newFileName = md5($request->profileImage->getClientOriginalName() . time());

            $_FILES["profileImage"]["name"] = $newFileName. "." .$request->profileImage->getClientOriginalExtension();

            $target_file = $target_dir .'/profiles'.'/'. basename($_FILES["profileImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // echo '<pre>'.print_r($target_file, 1).'</pre>';

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["profileImage"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {

                // Storage::put($_FILES["profileImage"]["tmp_name"], $path);
                // Storage::disk('local')->put("test", $_FILES["profileImage"]["name"]);
                if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                    // resize the image to a height of 200 and constrain aspect ratio (auto width)
                    $img = Image::make($target_file);
                    $img->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save();
                    echo "The file ". basename( $_FILES["profileImage"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        $profile_img = $_FILES["profileImage"]["name"] ? $_FILES["profileImage"]["name"] : $user->profile_img;
        $new_name = $_POST['name'];

        if ( !empty($new_name) ) {
            DB::table('users')
    			->where('email', $user->email)
    			->update([
    				'name' => $new_name,
                    'profile_img' => $profile_img
    			]);
            Session::flash('status', 'Profile update successful!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('status', 'Profile cannot be updated!');
            Session::flash('alert-class', 'alert-danger');
        }
        return back();
    }

    public function change_password()
    {
        return View::make('change-password');
    }

    public function change_password_update()
    {
        if(Auth::Check()){
			$current_password = Auth::user()->password;

			if (empty($_POST['oldPassword'])) {
				Session::flash('status', 'Please input you correct password!');
                Session::flash('alert-class', 'alert-danger');
			} elseif (empty($_POST['newPasswordA'])) {
				Session::flash('status', 'New password cannot be empty!');
                Session::flash('alert-class', 'alert-danger');
			} elseif (empty($_POST['newPasswordB'])) {
				Session::flash('status', 'Confirm password cannot be empty!');
                Session::flash('alert-class', 'alert-danger');
			} elseif (strlen($_POST['newPasswordA']) < 6) {
				Session::flash('status', 'New password must contain at least 6 characters');
                Session::flash('alert-class', 'alert-danger');
			} elseif (strlen($_POST['newPasswordB']) < 6) {
				Session::flash('status', 'Confirm password must contain at least 6 characters');
                Session::flash('alert-class', 'alert-danger');
			} elseif ($_POST['newPasswordA'] != $_POST['newPasswordB']) {
				Session::flash('status', 'New password and confirm password must be the same!');
                Session::flash('alert-class', 'alert-danger');
			} elseif (!(Hash::check($_POST['oldPassword'], $current_password))) {
				Session::flash('status', 'Old password incorrect!');
                Session::flash('alert-class', 'alert-danger');
			} elseif (Hash::check($_POST['newPasswordA'], $current_password)) {
				Session::flash('status', 'New password cannot be same as old password!');
                Session::flash('alert-class', 'alert-danger');
			} else {
				$user_id = Auth::User()->id;
				$obj_user = User::find($user_id);
				$obj_user->password = Hash::make($_POST['newPasswordB']);
				$obj_user->save();
				Session::flash('status', 'Change password successful!');
                Session::flash('alert-class', 'alert-success');
			}
		}
        // $user = Auth::user();
        // echo '<pre>'.print_r($user, 1).'</pre>';
        return View::make('change-password');
    }


    public function create_property(Request $request)
    {

        $method = $request->method();
        if ($request->isMethod('get')) {
            $districts = DB::table('districts')
                ->get();

            foreach ($districts as $key => $district) {
                $district->city = json_decode($district->city);
            }

            return View::make('pages/create-property')->with(array("districts"=>$districts));
        }

        if ($request->isMethod('post')) {

            $user = Auth::user();

            ini_set('memory_limit','256M');


            $this->validate($request, [
                'houseImg.*' => 'required|image|mimes:jpeg,png,jpg',
                // 'houseImg.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $property_code = str_random(128); // random string
            // $property_code = md5($string . time()); // image foloder name and house id

            if ($request->hasFile('houseImg')) {
                foreach ($request->file('houseImg') as $key => $image) {

                    $name = md5($image->getClientOriginalName() . time());
                    // $image      = $request->file('houseImg');
                    $fileName   = $name . '.' . $image->getClientOriginalExtension();


                    $img = Image::make($image->getRealPath());
                    // $img->resize(120, 120, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // });
                    $img->resize(1000, 724);
                    $img->stream(); // <-- Key point

                    Storage::disk('public')->put('properties/'.$property_code.'/'.$fileName, $img);

                    // should have thumbnails
                    $thumb = Image::make($image->getRealPath());
                    $thumb->resize(350, 250);
                    $thumb->stream(); // <-- Key point

                    Storage::disk('public')->put('properties/'.$property_code.'/thumbnails'.'/'.$fileName, $thumb);
                    $imgArray[] = $fileName; // temp array to store name of images
                }

            }
            $imgJson = json_encode($imgArray);

            // convert to date
            if ($_POST['time']) {
                $date = date_create($_POST['time']);
                $newDate= date_format($date,"Y-m-d");;
            } else {
                $newDate = null;
            }

            // get country and city from district
            $district = $_POST['district'];
            $districtArray = explode ("|", $district);

            DB::table('houses')
            ->insert(
                    [
                        'user_id'    => $user->id,
                        'property_code' => $property_code,
                        'title'      => $_POST['title'],
                        'purpose'    => $_POST['usage'],
                        'time'       => $newDate,
                        'country'    => $districtArray[1],
                        'city'       => $districtArray[0],
                        'address'    => $_POST['address'],
                        'measurement'=> $_POST['measure'],
                        'bedroom'    => $_POST['bedroom'],
                        'pictures'   => $imgJson,
                        'price'      => $_POST['price'],
                        'size'       => $_POST['size'],
                        'bathroom'   => $_POST['bathroom'],
                        'description'=> json_encode($_POST['description'])
                    ]
                );

            Session::flash('status', 'Property has been created successful!');
            Session::flash('alert-class', 'alert-success');

            return back();
            // echo '<pre>'.print_r($_POST, 1).'</pre>';

        }
    }


    public function property_list()
    {
        $user = Auth::user();
        $role = $user->role;
        // landlord
        if ($role == 2) {
            $myProperty = DB::table('houses')
                ->where('user_id', $user->id)
                ->get();
        }
        // admin
        if ($role == 0) {
            $myProperty = DB::table('houses')
            ->join('users', 'houses.user_id', '=', 'users.id')
            ->select('users.email', 'users.role', 'houses.id', 'houses.property_code', 'houses.title', 'houses.purpose', 'houses.time', 'houses.country', 'houses.city', 'houses.address', 'houses.updated_at', 'houses.created_at', 'houses.status')
                ->get();
        }

        // echo '<pre>'.print_r($myProperty, 1).'</pre>';

        return View::make('pages/property-list')->with(array('user' => $user, "properties"=>$myProperty));
    }

    public function publish_property()
    {

        $status = ($_POST['publish']==0) ? 1 : 0;

        DB::table('houses')
            ->where('property_code', $_POST['houseCode'])
            ->update([
                'status' => $status,
            ]);

        Session::flash('status', 'Property has been published! ');
        Session::flash('alert-class', 'alert-success');

        return back();
    }



    public function property($propertyCode)
    {
        $user = Auth::user();

        $myProperty = DB::table('houses')
            ->where('property_code', $propertyCode)
            ->first();

        $myProperty->description= json_decode($myProperty->description);
        $myProperty->pictures = json_decode($myProperty->pictures);

        if ($myProperty->features) {
            $myProperty->features = json_decode($myProperty->features);
        }
        if ($myProperty->videos) {
            $myProperty->videos = json_decode($myProperty->videos);
        }
        if ($myProperty->files) {
            $myProperty->files = json_decode($myProperty->files);
        }



        // echo '<pre>'.print_r($myProperty, 1).'</pre>';

        return View::make('pages/property')->with(array('user' => $user, "property"=>$myProperty));
    }

    public function edit_property($propertyCode)
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



        $myProperty->description = json_decode($myProperty->description);

        $picArray = json_decode($myProperty->pictures);
        $myProperty->pictures = $picArray;


        // echo '<pre>'.print_r($myProperty, 1).'</pre>';

        return View::make('pages/edit-property')->with(array('user' => $user, 'districts' => $districts, "property"=>$myProperty));
    }


    public function delete_property()
    {
        $user = Auth::user();
        if ( Auth::check() ){

            DB::table('houses')
                ->where('property_code', $_POST['property'])
                ->where('user_id', $user->id)
                ->delete();

            Storage::disk('public')->deleteDirectory('properties/'.$_POST['property']);
        }

        return redirect('property-list')->with('status', 'The property has been deleted');

    }


    public function update_property(Request $request, $propertyCode)
    {
        $user = Auth::user();

        ini_set('memory_limit','256M');

        // get image json from database
        $data = DB::table('houses')
            ->select('pictures')
            ->where('property_code', $propertyCode)
            ->first();

        $picArray= json_decode($data->pictures);


        // check origin images
        if ( !empty($_POST['orignImg']) ) {
            // compare with pictures
            $result = array_diff($picArray, $_POST['orignImg']);

            // delete images
            if( !empty($result) ){
                foreach ($result as $key => $img) {
                    Storage::disk('public')->delete('properties/'.$propertyCode.'/'.$img);
                    Storage::disk('public')->delete('properties/'.$propertyCode.'/thumbnails'.'/'.$img);
                }
            }

            // image to be stored into database
            foreach ($_POST['orignImg'] as $key => $img) {
                $imgArray[] = $img;
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

                Storage::disk('public')->put('properties/'.$propertyCode.'/'.$fileName, $img);

                // thumbnails
                $thumb = Image::make($image->getRealPath());
                $thumb->resize(550, 350);
                $thumb->stream(); // <-- Key point

                Storage::disk('public')->put('properties/'.$propertyCode.'/thumbnails'.'/'.$fileName, $thumb);
                $imgArray[] = $fileName; // temp array to store name of images
            }
        }

        if ( empty($imgArray) ) {
            Session::flash('status', 'Opps! Please upload at least one picture!');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }

        $imgJson = json_encode($imgArray);

        // convert to date
        if ($_POST['time']) {
            $date = date_create($_POST['time']);
            $newDate = date_format($date,"Y-m-d");;
        } else {
            $newDate = null;
        }


        // get country and city from district
        $district = $_POST['district'];
        $districtArray = explode ("|", $district);

        DB::table('houses')
            ->where('property_code', $propertyCode)
            ->update([
                'title'      => $_POST['title'],
                'purpose'    => $_POST['usage'],
                'time'       => $newDate,
                'country'    => $districtArray[1],
                'city'       => $districtArray[0],
                'address'    => $_POST['address'],
                'measurement'=> $_POST['measure'],
                'bedroom'    => $_POST['bedroom'],
                'pictures'   => $imgJson,
                'price'      => $_POST['price'],
                'size'       => $_POST['size'],
                'bathroom'   => $_POST['bathroom'],
                'description'=> json_encode($_POST['description'])
            ]);


        Session::flash('status', 'Property has been updated! ');
        Session::flash('alert-class', 'alert-success');

        return back();


        // echo '<pre>'.print_r($_POST, 1).'</pre>';

        // return View::make('pages/edit-property')->with(array('user' => $user, "property"=>$myProperty));
    }


}
