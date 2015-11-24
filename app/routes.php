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

//Trang thông báo
Route::get('/notice', function()
{
	return View::make('pages.notice');
});

//Trang chi tiết thông báo
Route::get('/notice/{id}', function($id)
{
	return View::make('pages.notice');
});

//Trang quy chế tuyển sinh
Route::get('/regulation', function()
{
	return View::make('pages.regulation');
});

//Trang ngành - chỉ tiêu
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
});

//st-admin -- LuanBN -----------------------------------------------------------------------------
//minister----------------------------------------------------------
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
	//use for ajax post
Route::post('/st-admin/minis/mn_uni_acc', 'UniversityController@list');
Route::post('/st-admin/minis/mn_depart_acc','DepartmentController@list');
Route::post('/st-admin/minis/mn_clus_acc','ClusterController@list');
Route::post('/st-admin/minis/mn_schedule','PhaseController@list');

	//add one
Route::post('/st-admin/minis/mn_uni_acc/add', 'UniversityController@add_one');
Route::post('/st-admin/minis/mn_depart_acc/add','DepartmentController@add_one');
Route::post('/st-admin/minis/mn_clus_acc/add','ClusterController@add_one');

	//send id and get data from server (edit form)
Route::post('/st-admin/minis/mn_uni_acc/get_edit_data', 'UniversityController@edit_show');
Route::post('/st-admin/minis/mn_depart_acc/get_edit_data','DepartmentController@edit_show');
Route::post('/st-admin/minis/mn_clus_acc/get_edit_data','ClusterController@edit_show');

	//send updated data
Route::post('/st-admin/minis/mn_uni_acc/update', 'UniversityController@edit_one');
Route::post('/st-admin/minis/mn_depart_acc/update','DepartmentController@edit_one');
Route::post('/st-admin/minis/mn_clus_acc/update','ClusterController@edit_one');

	//import excel data and update
Route::post('/st-admin/minis/mn_uni_acc/import_data', 'UniversityController@update_many');
Route::post('/st-admin/minis/mn_depart_acc/import_data','DepartmentController@update_many');
Route::post('/st-admin/minis/mn_clus_acc/import_data','ClusterController@update_many');

	//delete
Route::post('/st-admin/minis/mn_uni_acc/delete', 'UniversityController@delete');
Route::post('/st-admin/minis/mn_depart_acc/delete','DepartmentController@delete');
Route::post('/st-admin/minis/mn_clus_acc/delete','ClusterController@delete');

	//get data of scheduler.
Route::post('/st-admin/minis/mn_schedule/get_scheduler_data','PhaseController@setting_show');
Route::post('/st-admin/minis/mn_schedule/update_scheduler_data','PhaseController@setting');

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

	//post 
Route::post('/st-admin/clus/mn_stu_acc/add', 'StudentController@add_one');
Route::post('/st-admin/clus/mn_stu_acc/get_edit_data', 'StudentController@edit_show');
Route::post('/st-admin/clus/mn_stu_acc/update', 'StudentController@edit_one');
Route::post('/st-admin/clus/mn_stu_acc/delete', 'StudentController@delete');

//department--------------------------------------------------------------
Route::get('/st-admin/depart',function(){
	return View::make('st-admin.pages.depart.depart');
});
Route::get('/st-admin/depart/mn_stu_acc',function(){
	return View::make('st-admin.pages.depart.mn_stu_acc');
});
Route::get('/st-admin/depart/syn_result',function(){
	return View::make('st-admin.pages.depart.syn_result');
});

//university-------------------------------------------------------------
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