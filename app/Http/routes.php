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



//Route::get('/info', function() {
//    phpinfo();
//});

// For REST
Route::resource('product', 'ProductController');
Route::resource('order', 'OrderController');


// Need to use middleware on routes or else we get "Undefined variable: errors."
// (We disabled middleware in app/Providers/RouteServiceProvider.php for REST.)
Route::group(['middleware' => ['web']], function () {
    //routes here
    Route::get('/', function() {
        return view('home');
    })->middleware('auth');

    // Built-in Laravel routes for login and registration.
    Route::auth();

    // Route::get('/home', 'HomeController@index')->middleware('auth');
    
    // This captures all other routes, which will usually be our angular routes.
    Route::any('{all}', function($missingRoute) {
        return view('home');
    })->where('all', '(.*)')->middleware('auth');
    

});


