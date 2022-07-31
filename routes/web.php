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

Route::get('/', 'HomeController@index');
Route::get('/about', 'AboutController@index');
Route::get('/services', 'ServicesController@index');
Route::get('/services/{slug}', 'ServicesController@show');
Route::get('/contact', 'ContactController@index');
Route::post('/send-testimoni', 'ContactController@testimoni');
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/{slug}', 'ProjectsController@show');
Route::get('/news', 'NewsController@index');
Route::get('/news/{slug}', 'NewsController@show');
Route::get('/career', 'CareerController@index');
Route::get('/career/{slug}', 'CareerController@show');
Route::get('/recruitment/{id}', 'RecruitmentController@index');
Route::post('/send-recruitment', 'RecruitmentController@store');

Auth::routes();
Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){
    Route::get('/', 'Admin\HomeController@index');
    Route::group(['middleware' => 'super_admin'], function(){
        Route::resource('user', 'Admin\UserController');
        Route::get('/password/reset/{id}', 'Admin\PasswordController@reset');
    });

    Route::resource('/contact', 'Admin\ContactController');
    Route::resource('/attributes', 'Admin\AttributesController');
    Route::resource('/menu', 'Admin\MenuController');
    Route::resource('/brand', 'Admin\BrandController');
    Route::resource('/about', 'Admin\AboutController');
    Route::resource('/trusted', 'Admin\TrustedController');
    Route::resource('/services', 'Admin\ServicesController');
    Route::resource('/team', 'Admin\TeamController');
    Route::resource('/home-page', 'Admin\HomePageController');
    Route::resource('/image-layer', 'Admin\ImageLayerController');
    Route::get('/services-attribute', 'Admin\ServicesController@attribute');
    Route::put('/services-attribute/{id}', 'Admin\ServicesController@attributeUpdate');
    
    Route::resource('/testimonial','Admin\TestimonialController');
    Route::resource('/projects','Admin\ProjectsController');
    Route::get('/projects-attribute', 'Admin\ProjectsController@attribute');
    Route::put('/projects-attribute/{id}', 'Admin\ProjectsController@attributeUpdate');

    Route::resource('/news','Admin\NewsController');
    Route::get('/news-attribute', 'Admin\NewsController@attribute');
    Route::put('/news-attribute/{id}', 'Admin\NewsController@attributeUpdate');
    
    Route::resource('/career','Admin\CareerController');
    Route::get('/career-attribute', 'Admin\CareerController@attribute');
    Route::put('/career-attribute/{id}', 'Admin\CareerController@attributeUpdate');

    Route::resource('/recruitment', 'Admin\RecruitmentController');
});

Route::get('/artisan/{config}', function($config) {
    $exitCode = Artisan::call($config);
    return 'Berhasil';
}); 