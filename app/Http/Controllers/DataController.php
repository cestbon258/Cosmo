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

class DataController extends Controller
{
    public function home()
    {

        $allProperty = DB::table('houses')
            ->get();

        // get first image from json
        foreach ($allProperty as $key => $property) {
            $picArray = json_decode($property->pictures);
            $property->pictures = $picArray[0];
        }

        // echo '<pre>'.print_r($allProperty, 1).'</pre>';

        return View::make('pages/index')->with(array("properties"=>$allProperty));
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
        echo '<pre>'.print_r($target_file, 1).'</pre>';

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
        // $user = Auth::user();
        // echo '<pre>'.print_r($user, 1).'</pre>';
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
        $user = Auth::user();

        $this->validate($request, [
            'houseImg.*' => 'required|image|mimes:jpeg,png,jpg',
            // 'houseImg.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $string = str_random(40); // random string
        $house_id = md5($string . time()); // image foloder name and house id

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

                Storage::disk('uploads')->put($house_id.'/'.$fileName, $img);

                // should have thumbnails
                $thumb = Image::make($image->getRealPath());
                $thumb->resize(350, 250);
                $thumb->stream(); // <-- Key point

                Storage::disk('uploads')->put($house_id.'/thumbnails'.'/'.$fileName, $thumb);
                $imgArray[] = $fileName;
            }

        }
        $imgJson = json_encode($imgArray);
        // convert to date
        $date = date_create($_POST['time']);
        $newDate= date_format($date,"Y-m-d");;

        DB::table('houses')
        ->insert(
                [
                    'user_id'    => $user->id,
                    'house_code' => $house_id,
                    'title'      => $_POST['title'],
                    'purpose'    => $_POST['usage'],
                    'time'       => $newDate,
                    'country'    => $_POST['country'],
                    'city'       => $_POST['city'],
                    'address'    => $_POST['address'],
                    'measurement'=> $_POST['measure'],
                    'bedroom'    => $_POST['bedroom'],
                    'pictures'   => $imgJson,
                    'price'      => $_POST['price'],
                    'size'       => $_POST['size'],
                    'bathroom'   => $_POST['bathroom'],
                    'description'=> $_POST['description']
                ]
            );

        Session::flash('status', 'Profile update successful!');
        Session::flash('alert-class', 'alert-success');

        return back();

        // echo '<pre>'.print_r($_POST, 1).'</pre>';
        // echo '<pre>'.print_r($newDate, 1).'</pre>';




        // echo '<pre>'.print_r( $request->file('customFile'), 1).'</pre>';

        // if ($request->hasFile('customFile')) {
        //     $image = $request->file('customFile');
        //     $name = time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/uploads');
        //     $image->move($destinationPath, $name);
        //     // $this->save();
        //
        //     return back()->with('success','Image Upload successfully');
        // }


        // echo '<pre>'.print_r($_POST, 1).'</pre>';
        // return View::make('create-property');
    }


    public function property_list()
    {
        $user = Auth::user();

        $myProperty = DB::table('houses')
            ->where('user_id', $user->id)
            ->get();


        echo '<pre>'.print_r($myProperty, 1).'</pre>';

        return View::make('pages/property-list')->with(array('user' => $user, "properties"=>$myProperty));
    }


    public function property($houseCode)
    {
        $user = Auth::user();

        $myProperty = DB::table('houses')
            ->where('house_code', $houseCode)
            ->first();

        $picArray = json_decode($myProperty->pictures);

        $myProperty->pictures = $picArray;


        // echo '<pre>'.print_r($myProperty, 1).'</pre>';

        return View::make('pages/property')->with(array('user' => $user, "property"=>$myProperty));
    }

    public function edit_property($houseCode)
    {
        $user = Auth::user();

        $myProperty = DB::table('houses')
            ->where('house_code', $houseCode)
            ->first();

        $dateValue = $myProperty->time;
        $time=strtotime($dateValue);
        $temp=date("Y-m",$time);
        $myProperty->time = $temp;

        $picArray = json_decode($myProperty->pictures);
        $myProperty->pictures = $picArray;

        echo '<pre>'.print_r($myProperty, 1).'</pre>';

        return View::make('pages/edit-property')->with(array('user' => $user, "property"=>$myProperty));
    }


}
