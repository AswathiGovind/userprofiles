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

Route::get('/', function () {
    return view('welcome');
});


 /*Admin Login & Reset & Logout Routes*/

 Route::group(['prefix'=>'admin'],function(){ 


    Route::get('login',['as'=>'logn','uses'=>'admin\AdminController@index']);
    Route::post('dologin',['as'=>'dologin','before'=>'csrf','uses'=>'admin\AdminController@dologin']);

    Route::group(['middleware'=>'isloggedIn'],function(){
        
        Route::get('dashboard',['as'=>'dashboard','uses'=>'admin\AdminController@dashboard']);	
        Route::get('add-users',['as'=>'add_users','uses'=>'admin\AdminController@add_users']);
        Route::post('save_new_user',['as'=>'save_new_user','uses'=>'admin\AdminController@save_new_user']);	
        Route::get('list-users',['as'=>'list_users','uses'=>'admin\AdminController@list_users']);
        Route::get('edit-user/{id}',['as'=>'edit_user','uses'=>'admin\AdminController@edit_user']);
        Route::post('update_user',['as'=>'update_user','uses'=>'admin\AdminController@update_user']);
        Route::post('check_user_email',['as'=>'check_user_email','uses'=>'admin\AdminController@check_user_email']);	
        Route::post('delete_user',['as'=>'delete_user','uses'=>'admin\AdminController@delete_user']);
        Route::post('user_search',['as'=>'user_search','uses'=>'admin\AdminController@user_search']);
        Route::get('logout',['as'=>'logout','uses'=>'admin\AdminController@logout']);
        Route::post('change_user_approval',['as'=>'change_user_approval','uses'=>'admin\AdminController@change_user_approval']);	
    });	
 });

/* Front end */
 Route::get('register',['as'=>'register','uses'=>'frontend\UserController@index']);	
 Route::post('register_user',['as'=>'register_user','uses'=>'frontend\UserController@register_user']);
   




