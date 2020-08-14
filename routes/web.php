<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SiteController@index');
Route::get('/about','SiteController@about');
Route::get('/portfolio', 'SiteController@portfolio');
//Route::get('/portfolio/id','SiteController@work');
Route::get('/services','SiteController@services');

Auth::routes();
Route::get('logout','Auth\LoginController@logout');

Route::match(['get','post'], 'register', function(){
    return redirect('/');
});

Route::get('/portfolio/{id}', 'SiteController@work');


Route::prefix('apanel')->middleware('auth')->group(function () {
    Route::get('/', 'Admin\IndexController@index');
    Route::get('/newpost', 'Admin\PostController@index');
    Route::get('/about', 'Admin\AboutController@index');
    Route::get('/newservice','Admin\ServiceController@index');
    Route::get('/newfeedback','Admin\FeedbackController@index');

    Route::get('/deletefb/{id}','Admin\FeedbackController@delete');
    Route::get('/deleteserv/{id}', 'Admin\ServiceController@delete');
    Route::get('/deletepost/{id}', 'Admin\PostController@delete');
    


    Route::post('/saveabout', 'Admin\AboutController@saveabout');
    Route::post('/savemain', 'Admin\IndexController@update');
    Route::post('/addfeedback', 'Admin\FeedbackController@addItem');
    Route::post('/addservice', 'Admin\ServiceController@addItem');
    Route::post('/addpost', 'Admin\PostController@addItem');

});
