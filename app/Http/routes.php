<?php
// Name: routes.php
// Description: The routes that this Laravel service will support.
//
// History:
// Edward Wang   4/18/2017  Created.
// Edward Wang   1/11/2018  Remove code to handle Angular routing since it
// is no longer necessary due to the addition of the 404.blade.php file.

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

// For REST
Route::resource('product', 'ProductController');
Route::resource('order', 'OrderController');


// In order for Angular to work we had to create resources/views/errors/404.blade.php
// to redirect Angular routes to the home page.
// e.g.,
// header("Location: http://{$_SERVER['SERVER_NAME']}/");