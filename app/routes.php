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


//st-admin

Route::get('/st-admin/index.php', function(){
	// return View::make('st-admin.layout.depart');
	//Redirect by session
});
Route::get('/st-admin/depart', function(){
	return View::make('st-admin.pages.depart');
});
Route::get('/st-admin/uni', function(){
	return View::make('st-admin.pages.uni');
});
Route::get('/st-admin/minis', function(){
	return View::make('st-admin.pages.minis');
});
Route::get('/st-admin/clus', function(){
	return View::make('st-admin.pages.clus');
});
Route::get('/hello',function(){
	return View::make('hello');
});

//----------------- HuanPC--------------------------------------------------------------------
// Department controller
// Show danh sach truong + infor
Route::get('/minis/mn_uni_acc','@index');
// Sua
Route::get('/minis/mn_uni_acc/edit?id={id}','@edit');
// Them
Route::post('/minis/mn_uni_acc/add_many','@storeMany');
Route::post('/minis/mn_uni_acc/add_one','@store');
// Xoa
Route::get('/minis/mn_uni_acc/del?id={id}','@delete');

// Cluster controller
// Show danh sach truong + infor
Route::get('/minis/mn_clus_acc','@index');
// Sua
Route::get('/minis/mn_clus_acc/edit?id={id}','@edit');
// Them
Route::post('/minis/mn_clus_acc/add/add_many','@storeMany');
Route::post('/minis/mn_clus_acc/add/add_one','@store');
// Xoa
Route::get('/minis/mn_clus_acc/del?id={id}','@delete');

// University controller
// Show danh sach truong + infor
Route::get('/minis/mn_uni_acc','UniversityController@index');
// Sua
Route::get('/minis/mn_uni_acc/edit?id={id}','UniversityController@edit');
// Them
Route::post('/minis/mn_uni_acc/add/add_many','UniversityController@storeMany');
Route::post('/minis/mn_uni_acc/add/add_one','UniversityController@store');
// Xoa
Route::get('/minis/mn_uni_acc/del?id={id}','UniversityController@delete');
//---------------------------------------------------------------------------------------------


// Router check code
Route::get('/major', function(){
	return 'ABC';
});

// Major controller
Route::get('/major/index/{university_id}','MajorController@index'); //liet ke cac nganh cua truong co id
Route::get('/major/{university_id}/add_major','MajorController@add_major'); //them nganh cua truong co id
Route::get('/major/{university_id}/edit_major','MajorController@edit_major'); //sua nganh cua truong co id
// 