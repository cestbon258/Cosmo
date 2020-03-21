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

Route::get('/', 'DataController@home')->name('/');

Route::get('/about-us', function () {
    return view('pages/about-us');
})->name('about-us');

Route::get('/contact', function () {
    return view('pages/contact');
})->name('contact');

Route::get('/create-property', function () {
    return view('pages/create-property');
})->name('create-property');

Route::get('/property-list', 'DataController@property_list')->name('property-list');

Route::get('/property/{houseCode}', 'DataController@property');

Route::post('/create-property', 'DataController@create_property');
Route::get('/edit-property/{houseCode}', 'DataController@edit_property');

Route::post('/contact', 'MailController@contact_us');


Route::get('/profile', 'DataController@profile')->name('profile');
Route::post('/profile/update', 'DataController@profile_update')->name('profile/update');

Route::get('/change-password', 'DataController@change_password')->name('change-password');
Route::post('/change-password/update', 'DataController@change_password_update')->name('change-password/update');

Route::get('/logout', function () {
    return view('pages/contact');
});


Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('profiles/' . $filename))->response();
});


Route::get('/images/{folder}/{filename}', function ($folder,$filename)
{
    $path = storage_path('houses/' . $folder .'/'. $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('/images/{folder}/thumbnails/{filename}', function ($folder,$filename)
{
    $path = storage_path('houses/' . $folder .'/thumbnails'.'/'. $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
// sign out
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
