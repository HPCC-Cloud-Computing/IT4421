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

//Trang chủ
Route::get('/', function()
{
	return View::make('pages.home');
});

//Trang quy chế tuyển sinh
Route::get('/regulation', function()
{
	return View::make('pages.regulation');
});

//Trang ngành tuyển sinh
Route::get('/majors', function()
{
	return View::make('pages.majors');
});

//Trang tra cứu điểm thi
Route::get('/result_info', function()
{
	return View::make('pages.result_info');
});

//Trang liên hệ
Route::get('/contact', function()
{
	return View::make('pages.contact');
});

//Trang thông tin người dùng
Route::get('/stu/profile', function(){
	return View::make('pages.stu.profile');
});

//Trang đăng ký xét tuyển
Route::get('/stu/aspiration_reg', function(){
	return View::make('pages.stu.aspiration_reg');

//st-admin -- LuanBN -----------------------------------------------------------------------------
//minister
Route::get('/st-admin/minis', function(){
	return View::make('st-admin.pages.minis.minis');
});
Route::get('/st-admin/minis/mn_uni_acc',function(){
	return View::make('st-admin.pages.minis.mn_uni_acc');
});
Route::get('/st-admin/minis/mn_clus_acc',function(){
	return View::make('st-admin.pages.minis.mn_clus_acc');
});
Route::get('/st-admin/minis/mn_depart_acc',function(){
	return View::make('st-admin.pages.minis.mn_depart_acc');
});
Route::get('/st-admin/minis/mn_schedule',function(){
	return View::make('st-admin.pages.minis.mn_schedule');
});
Route::get('/st-admin/minis/score_floor_setup',function(){
	return View::make('st-admin.pages.minis.score_floor_setup');
});
Route::get('/st-admin/minis/syn_result',function(){
	return View::make('st-admin.pages.minis.syn_result');
});

// cluster
Route::get('/st-admin/clus',function(){
	return View::make('st-admin.pages.clus.clus');
});
Route::get('/st-admin/clus/mn_stu_acc',function(){
	return View::make('st-admin.pages.depart.mn_stu_acc');
});
Route::get('/st-admin/clus/syn_result',function(){
	return View::make('st-admin.pages.clus.syn_result');
});

//department
Route::get('/st-admin/depart',function(){
	return View::make('st-admin.pages.depart.depart');
});
Route::get('/st-admin/depart/mn_stu_acc',function(){
	return View::make('st-admin.pages.depart.mn_stu_acc');
});
Route::get('/st-admin/depart/syn_result',function(){
	return View::make('st-admin.pages.depart.syn_result');
});

//university
Route::get('/st-admin/uni',function(){
	return View::make('st-admin.pages.uni.uni');
});
Route::get('/st-admin/uni/mn_major',function(){
	return View::make('st-admin.pages.uni.mn_major');
});
Route::get('/st-admin/uni/syn_result',function(){
	return View::make('st-admin.pages.uni.syn_result');
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