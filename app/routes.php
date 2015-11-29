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
Route::get('/', 'HomeController@index');

//Trang thông báo
Route::get('/notice', 'NoticeController@index');

//Trang chi tiết thông báo
Route::get('/notice/{id}', 'NoticeController@show');

//Trang quy chế tuyển sinh --- chua lam
Route::get('/regulation', function()
{
	return View::make('pages.regulation');
});

//Trang ngành - chỉ tiêu 
// Show list danh sach nganh cua tat ca cac truong
Route::get('/majors/', 'MajorController@get_list');
// Show cua 1 truong
Route::get('/majors/uni/{id}', 'MajorController@show');

//Trang tra cứu điểm thi
Route::get('/result_info', 'ExamScoreController@show_page');

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

//st-admin -- LuanBN + HuanPC--------------------------------------------------------------------
//---------------------------------------minister page-------------------------------------------
Route::get('/st-admin/minis', 'MinisterController@index');
//---------------------------------------minister sub page --------------------------------------
Route::get('/st-admin/minis/mn_uni_acc','MinisterController@uni_manage_page');
Route::get('/st-admin/minis/mn_clus_acc','MinisterController@cluster_manage_page');
Route::get('/st-admin/minis/mn_depart_acc','MinisterController@dept_manage_page');
Route::get('/st-admin/minis/mn_schedule','MinisterController@phase_manage_page');
Route::get('/st-admin/minis/score_floor_setup','MinisterController@score_floor_setup_page');
Route::get('/st-admin/minis/syn_result','MinisterController@syn_result_page');

// ---------------------------------Schedule---------------------------------------------------
Route::get('/st-admin/minis/mn_schedule/get_scheduler_data','PhaseController@setting_show');
Route::get('/st-admin/minis/mn_schedule/update_scheduler_data','PhaseController@setting');
// --------------------------------- Department -------------------------------------------
// Show danh sach truong + infor
Route::get('/st-admin/minis/mn_depart_acc/list','DepartmentController@get_list');
// Sua
//$data = '{"code","name"}'
Route::get('/st-admin/minis/mn_depart_acc/edit/{id}','DepartmentController@edit');
// Sua: Post thong tin sua len server
// $data = '{"dept":{"id":81,"code":"adsf_new","name":"sdfasdfsd"},"user":{"id":8,"username":"dfsdf_new","password":"dsafdsf","email":"43243324"}}';
Route::post('/st-admin/minis/mn_depart_acc/update','DepartmentController@update');
// search
Route::get('/st-admin/minis/mn_depart_acc/search/{code}/{name}','DepartmentController@search');
// Them
Route::post('/st-admin/minis/mn_depart_acc/add_many','DepartmentController@add_many');
// $data = '{"depart":{"code":"adsf","name":"sdfasdfsd"},"user":{"username":"dfsdf","password":"dsafdsf","email":"43243324"}}';
Route::get('/st-admin/minis/mn_depart_acc/add_one','DepartmentController@add');
// Xoa
Route::get('/st-admin/minis/mn_depart_acc/del/{id}','DepartmentController@destroy');
//------------------------------------------end-------------------------------------------------

// ---------------------------------Cluster --------------------------------------------------
// Show danh sach truong + infor
Route::get('/st-admin/minis/mn_clus_acc/list','ClusterController@get_list');
// Sua: Lay form sua thong tin
Route::get('/st-admin/minis/mn_clus_acc/edit/{id}','ClusterController@edit');
// Sua: Post thong tin sua len server
Route::post('/st-admin/minis/mn_clus_acc/update','ClusterController@update');
// search
Route::get('/st-admin/minis/mn_clus_acc/search/{code}/{name}','ClusterController@search');
// Them
Route::post('/st-admin/minis/mn_clus_acc/add/add_many','ClusterController@add_many');
Route::post('/st-admin/minis/mn_clus_acc/add/add_one','ClusterController@add');
// Xoa

Route::get('/st-admin/minis/mn_clus_acc/del/{id}','ClusterController@destroy');
//------------------------------------------end-------------------------------------------------

// ---------------------------------University ---------------------------------
// Show danh sach truong + infor
Route::get('/st-admin/minis/mn_uni_acc/list','UniversityController@get_list');
// Sua: Lay form sua thong tin
Route::get('/st-admin/minis/mn_uni_acc/edit/{id}','UniversityController@edit');
// Sua: Post thong tin sua len server
Route::post('/st-admin/minis/mn_uni_acc/update','UniversityController@update');
// search
Route::get('/st-admin/minis/mn_uni_acc/search/{code}/{name}','UniversityController@search');
// Them
Route::post('/st-admin/minis/mn_uni_acc/add/add_many','UniversityController@add_many');
Route::post('/st-admin/minis/mn_uni_acc/add/add_one','UniversityController@add');
// Xoas
Route::get('/st-admin/minis/mn_uni_acc/del/{id}','UniversityController@destroy');
//------------------------------------------end------------------------------------------------
//---------------------------------end minister page-------------------------------------------


// ---------------------------------cluster management page------------------------------------
Route::get('/st-admin/clus','ClusterController@index');
Route::get('/st-admin/clus/mn_stu_acc','ClusterController@manage_student_page');
Route::get('/st-admin/clus/syn_result','ClusterController@syn_result');
	//post // not done!!
Route::get('/st-admin/clus/mn_stu_acc/add', 'StudentController@add_one');
Route::get('/st-admin/clus/mn_stu_acc/edit/{id}', 'StudentController@edit_show');
Route::post('/st-admin/clus/mn_stu_acc/update', 'StudentController@edit_one');
Route::get('/st-admin/clus/mn_stu_acc/delete/{id}', 'StudentController@destroy');
//Quan ly phong thi --- not done
// K can doan nay vi tich hop vao doan edit cluster
Route::get('/st-admin/clus/mn_exam_room', 'ExamRoomController@index');
Route::post('/st-admin/clus/mn_exam_room/add', 'ExamRoomController@add');
Route::get('/st-admin/clus/mn_exam_room/edit', 'ExamRoomController@edit');
Route::get('/st-admin/clus/mn_exam_room/delete/{id}', 'ExamRoomController@destroy');

//------------------------------------------end-------------------------------------------------

//----------------------------------department management page---------------------------------
Route::get('/st-admin/depart','DepartmentController@index');
// Doan nay k can truyen id cua dept vi lay tu session
Route::get('/st-admin/depart/mn_stu_acc/{id}','DepartmentController@manage_student_page');
Route::get('/st-admin/depart/syn_result','DepartmentController@syn_result');
//------------------------------------------end-------------------------------------------------

//----------------------------------university management page---------------------------------
Route::get('/st-admin/uni','UniversityController@index');
Route::get('/st-admin/uni/mn_major','UniversityController@manage_major_page');
Route::get('/st-admin/uni/syn_result','UniversityController@syn_result');
//------------------------------------------end-------------------------------------------------

//----------------------------------Major management page------------------------------------------------
Route::get('/st-admin/uni/mn_major/search/{code}/{name}','MajorController@search');
Route::get('/major/index/{university_id}','MajorController@index'); //liet ke cac nganh cua truong co id
Route::get('/major/{university_id}/add_major','MajorController@add_major'); //them nganh cua truong co id
Route::get('/major/{university_id}/edit_major','MajorController@edit_major'); //sua nganh cua truong co id
//------------------------------------------end-----------------------------------------------------------

// Router check code
Route::get('/major', function(){
	return 'ABC';
});