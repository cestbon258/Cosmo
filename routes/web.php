<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes(['verify' => true]);

Route::redirect('/', '/en');



Route::group(['prefix' => '{locale}'], function () {

    Route::get('/', 'DataController@home')->name('/');

    Route::get('/property/{propertyCode}', 'DataController@property')->name('property');

    Route::get('/about-us', 'DataController@about_us')->name('about-us');

    Route::get('/contact', function () {
        return view('pages/contact');
    })->name('contact');

    Route::get('/terms', function () {
        return view('pages/terms');
    })->name('terms');

    Route::get('/privacy', function () {
        return view('pages/privacy');
    })->name('privacy');

    Route::get('/disclaimer', function () {
        return view('pages/disclaimer');
    })->name('disclaimer');



    Route::get('/search-by', 'DataController@search_by')->name('search-by');

    Route::get('/get-districts', 'DataController@get_districts')->name('get_districts');
    Route::get('/media', 'MediaController@media')->name('media');
    Route::get('/video', 'VideoController@video')->name('video');


    Route::get('/vr-property', 'DataController@get_vr_property')->name('vr-property');


    Route::get('/events', 'DataController@events')->name('events');
    Route::post('/register-event', 'MailController@register_event')->name('register_event');



    Route::group(['middleware' => 'auth'], function () {

        Route::get('/search', 'DataController@search')->name('search');

        Route::get('/property-list', 'DataController@property_list')->name('property-list');
        Route::post('/publish-property', 'DataController@publish_property')->name('publish-property');

        Route::post('/request-more', 'MailController@request_more')->name('request_more');

        Route::get('/like-this', 'DataController@like_this')->name('like_this');
        Route::post('/unlike-this', 'DataController@unlike_this')->name('unlike_this');
        Route::get('/favorite', 'DataController@favorite')->name('favorite');


        Route::get('/update-project-status', 'DataController@update_project_status')->name('update_project_status');


        // user control panel
        Route::get('/users', 'UserController@all_user')->name('account');
        Route::post('/update-status', 'UserController@update_status')->name('update-status');
        Route::post('/delete-user', 'UserController@delete_user')->name('delete-user');
        // Route::get('/property', 'DataController@property')->name('property');

        // property
        Route::get('/create-property', 'DataController@create_property')->name('create-property');
        Route::post('/create-property', 'DataController@create_property');
        Route::get('/edit-property/{propertyCode}', 'DataController@edit_property')->name('edit-property');
        Route::post('/edit-property/{propertyCode}', 'DataController@update_property')->name('update-property');
        Route::post('/delete-property', 'DataController@delete_property')->name('delete-property');

        // project
        Route::get('/create-project', 'ProjectController@create_project')->name('create-project');
        Route::post('/create-project', 'ProjectController@create_project')->name('create-project');
        Route::get('/edit-project/{propertyCode}', 'ProjectController@edit_project')->name('edit-project');
        Route::post('/edit-project/{propertyCode}', 'ProjectController@update_project')->name('update-project');
        Route::post('/delete-project', 'ProjectController@delete_project')->name('delete-project');
        // media
        Route::any('/create-media', 'MediaController@create_media')->name('create-media');
        Route::any('/update-media', 'MediaController@update_media')->name('update-media');

        // video
        Route::any('/create-video', 'VideoController@create_video')->name('create-video');
        Route::any('/edit-video/{videoCode}', 'VideoController@edit_video')->name('edit-video');
        Route::any('/update-video/{videoCode}', 'VideoController@update_video')->name('update-video');
        Route::any('/video-list', 'VideoController@video_list')->name('video-list');
        Route::post('/publish-video', 'VideoController@publish_video')->name('publish-video');
        Route::post('/delete-video', 'VideoController@delete_video')->name('delete-video');



        // profile
        Route::get('/profile', 'DataController@profile')->name('profile')->middleware('verified');
        Route::post('/profile/update', 'DataController@profile_update')->name('profile/update');

        // password
        Route::get('/change-password', 'DataController@change_password')->name('change-password');
        Route::post('/change-password/update', 'DataController@change_password_update')->name('change-password-update');

        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        Route::post('contact', 'MailController@contact_us');

    });

    // Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');



    Auth::routes();



    // sign out
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::get('/password/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');





// Route::get('/password/reset/{email}', 'ProjectController@test')->name('password.reset');

// Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


Route::get('storage/{filename}', function ($filename) {
    return Image::make(storage_path('profiles/' . $filename))->response();
});


// Route::get('/images/{folder}/{filename}', function ($folder,$filename)
// {
//     $path = storage_path('houses/' . $folder .'/'. $filename);
//
//     if (!File::exists($path)) {
//         abort(404);
//     }
//
//     $file = File::get($path);
//     $type = File::mimeType($path);
//
//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);
//
//     return $response;
// });
//
//
// Route::get('/images/{folder}/thumbnails/{filename}', function ($folder,$filename)
// {
//     $path = storage_path('houses/' . $folder .'/thumbnails'.'/'. $filename);
//
//     if (!File::exists($path)) {
//         abort(404);
//     }
//
//     $file = File::get($path);
//     $type = File::mimeType($path);
//
//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);
//
//     return $response;
// });
