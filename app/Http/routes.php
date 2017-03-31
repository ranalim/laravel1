<?php

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

//Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);


//Route::get('about', function (){
//    return view('about');
//});
//Route::get('contact', function (){
//    return view('contact');
//});

// middleware usage --> https://laravel.com/docs/5.0/controllers
//Route::get('profile', [
//    'middleware' => 'auth',
//    'uses' => 'UserController@showProfile'
//]);

                        //set locale middleware
Route::group(['middleware'=>['web']], function(){
//    https://www.youtube.com/watch?v=CYvFCDq8jiw&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=32
    // Authentication Routes
    Route::get('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', ['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);
    // Registration Routes
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    // Password Reset Routes
//    https://www.youtube.com/watch?v=duMmNEJEZCw&index=35&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
    Route::get('password/reset', 'Auth\PasswordController@getEmail');
    Route::get('password/reset/{token?}', 'Auth\PasswordController@getReset');
    Route::post('password/email', 'Auth\PasswordController@sendResetLink');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

    // Categories
//    https://www.youtube.com/watch?v=YddUdqX-nCI&index=38&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
                                                        // only => []
    Route::resource('categories', 'CategoryController', ['except'=>['create']]);

    // Tags
//    https://www.youtube.com/watch?v=mL_7im7CBOE&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=42
    Route::resource('tags', 'TagController', ['except'=>['create']]);


//    https://www.youtube.com/watch?v=VqewG1lcjKw&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=28
    Route::get('blog/{slug}', [
        'as'=>'blog.single',
        'uses'=>'BlogController@getSingle'
    ])->where('slug', '[\w\d\-\_]+');

//    https://www.youtube.com/watch?v=SkVgSOUUGvg&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx&index=30
    Route::get('blog', ['uses'=>'BlogController@getIndex', 'as'=>'blog.index']);

    //https://www.youtube.com/watch?v=C87Pc-xh3xg&index=4&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
    Route::get('contact', 'PagesController@getContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('home','PagesController@getIndex');
    Route::get('/', 'PagesController@getInit');

//    https://www.youtube.com/watch?v=_WUCOL-eV3o&index=11&list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx
    //Route::resource('posts', 'PostController', ['only' => ['index', 'show']]);
    //Route::resource('posts', 'PostController', ['names'=>['create' => 'photo.build']]);
    Route::resource('posts', 'PostController');

});