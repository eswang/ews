<?php
// Name: routes.php
// Description: The routes that this Laravel service will support.
//
// History:
// Edward Wang   4/18/2017  Created.

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

// For Angular
Route::get('uiProduct', function() {
    return view('home');
});
Route::get('uiProduct/{id}', function() {
    return view('home');
});
Route::get('uiNewProduct', function() {
    return view('home');
});