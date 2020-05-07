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

    Route::post('/request-more', 'MailController@request_more')->name('request_more');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/search', 'DataController@search')->name('search');

        Route::get('/property-list', 'DataController@property_list')->name('property-list');
        Route::post('/publish-property', 'DataController@publish_property')->name('publish-property');

        Route::get('/property/{propertyCode}', 'DataController@property')->name('property');


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

        // profile
        Route::get('/profile', 'DataController@profile')->name('profile')->middleware('verified');
        Route::post('/profile/update', 'DataController@profile_update')->name('profile/update');

        // password
        Route::get('/change-password', 'DataController@change_password')->name('change-password');
        Route::post('/change-password/update', 'DataController@change_password_update')->name('change-password-update');

        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        Route::post('contact', 'MailController@contact_us');

    });

    Auth::routes();



    // sign out
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

});








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
