<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.home');
});

Route::get('/user/profile', function(){
	return View::make('pages.profile');
});

Route::get('/st-admin/login', function(){
	return View::make('st-admin.login');
});

Route::get('/st-admin/index.php', function(){
	return View::make('st-admin.layout.depart');
});
Route::get('/st-admin/', function(){
	return View::make('st-admin.pages.depart');
});