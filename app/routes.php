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

Route::post('/login', 'UserController@login');
Route::get('/logout', "UserController@logout");
Route::get('/404', function () {
	return View::make('404');
});

//Trang chủ
Route::get('/', 'HomeController@index');

//Trang thông báo
Route::get('/notice', 'NoticeController@index');

//Trang chi tiết thông báo
Route::get('/notice{id}', 'NoticeController@show');

//Trang quy chế tuyển sinh --- chua lam
Route::get('/regulation', function () {
	return View::make('pages.regulation');
});

//Trang ngành - chỉ tiêu
// Show list danh sach nganh cua tat ca cac truong
Route::get('/majors/{id}', 'MajorController@get_list');
// Show list truong
Route::get('/majors/', 'MajorController@get_list_uni');
// Show cua 1 truong
Route::get('/majors/uni/{id}', 'MajorController@show');

//Trang tra cứu điểm thi
Route::get('/result', 'ExamScoreController@show_page');
//Tra cuu diem thi
Route::post('/result/search', 'ExamScoreController@search');
// Captra check
Route::post('/check_captra', 'HomeController@checkCaptra');

//Trang liên hệ
Route::get('/contact', function () {
	return View::make('pages.contact');
});

//Filter usertype = student
Route::group(array('before' => array('auth', 'student')), function () {
	//Filter truoc tuyen sinh
	Route::group(array('before' => 'truoc_tuyen_sinh'), function () {

	});

	//Filter trong tuyen sinh
	Route::group(array('before' => 'trong_tuyen_sinh'), function () {
		//Trang đăng ký xét tuyển
		Route::get('/stu/aspiration_reg', 'WishController@aspiration_reg');
		Route::post('/stu/aspiration_reg/add', 'WishController@add_wish');
	});

	//Filter sau tuyen sinh
	Route::group(array('before' => 'sau_tuyen_sinh'), function () {

	});

	//Trang thông tin người dùng
	Route::get('/stu/profile', function () {
		return View::make('pages.stu.profile');
	});

	//Trang đổi mật khẩu
	Route::get('/stu/change_pass', function () {
		return View::make('pages.stu.change_pass');
	});
	Route::post('/stu/save_pass', 'UserController@savePass');

});

//Filter usertype = minister
Route::group(array('before' => array('auth', 'minister')), function () {
	//Filter truoc tuyen sinh
	Route::group(array('before' => 'truoc_tuyen_sinh'), function () {

	});

	//Filter trong tuyen sinh
	Route::group(array('before' => 'trong_tuyen_sinh'), function () {

	});

	//Filter sau tuyen sinh
	Route::group(array('before' => 'sau_tuyen_sinh'), function () {

	});

	//st-admin -- LuanBN + HuanPC--------------------------------------------------------------------
	//---------------------------------------minister page-------------------------------------------
	Route::get('/st-admin/minis', 'MinisterController@index');
	//---------------------------------------minister sub page --------------------------------------
	Route::get('/st-admin/minis/mn_uni_acc', 'MinisterController@uni_manage_page');
	Route::get('/st-admin/minis/mn_clus_acc', 'MinisterController@cluster_manage_page');
	Route::get('/st-admin/minis/mn_depart_acc', 'MinisterController@dept_manage_page');
	Route::get('/st-admin/minis/mn_schedule', 'MinisterController@phase_manage_page');
	Route::get('/st-admin/minis/score_floor_setup', 'MinisterController@score_floor_setup_page');
	Route::get('/st-admin/minis/syn_result', 'MinisterController@syn_result_page');

	// ---------------------------------Schedule---------------------------------------------------
	Route::get('/st-admin/minis/mn_schedule/edit/{id}', 'PhaseController@edit_show');
	Route::post('/st-admin/minis/mn_schedule/update', 'PhaseController@update');
	// --------------------------------- Department -------------------------------------------
	// Show danh sach truong + infor
	Route::get('/st-admin/minis/mn_depart_acc/list', 'DepartmentController@get_list');
	// Export dept to csv file
	Route::get('/st-admin/minis/mn_depart_acc/export', 'DepartmentController@export_data');
	// Sua
	//$data = '{"code","name"}'
	Route::get('/st-admin/minis/mn_depart_acc/edit/{id}', 'DepartmentController@edit');
	// Sua: Post thong tin sua len server
	// $data = '{"dept":{"id":81,"code":"adsf_new","name":"sdfasdfsd"},"user":{"id":8,"username":"dfsdf_new","password":"dsafdsf","email":"43243324"}}';
	Route::post('/st-admin/minis/mn_depart_acc/update', 'DepartmentController@update');
	// search
	Route::get('/st-admin/minis/mn_depart_acc/search', 'DepartmentController@search');
	// Them nhieu $data = {{code,name,username,password,email},...}
	Route::post('/st-admin/minis/mn_depart_acc/add_many', 'DepartmentController@add_many');
	// $data = {depart:{code,name},user:{username,password,email}}
	Route::post('/st-admin/minis/mn_depart_acc/add_one', 'DepartmentController@add');
	// Xoa
	Route::get('/st-admin/minis/mn_depart_acc/del/{id}', 'DepartmentController@destroy');
	//------------------------------------------end-------------------------------------------------

	// ---------------------------------Cluster --------------------------------------------------
	// Show danh sach truong + infor
	Route::get('/st-admin/minis/mn_clus_acc/list', 'ClusterController@get_list');
	// Export Cluster
	Route::get('/st-admin/minis/mn_clus_acc/export', 'ClusterController@export_data');
	// Sua: Lay form sua thong tin
	Route::get('/st-admin/minis/mn_clus_acc/edit/{id}', 'ClusterController@edit');
	// Sua: Post thong tin sua len server
	Route::post('/st-admin/minis/mn_clus_acc/update', 'ClusterController@update');
	// search
	Route::get('/st-admin/minis/mn_clus_acc/search', 'ClusterController@search');
	// Them nhieu $data = {{code,name,username,password,email},...}
	Route::post('/st-admin/minis/mn_clus_acc/add/add_many', 'ClusterController@add_many');
	// $data = {cluster:{code,name},user:{username,password,email}}
	Route::post('/st-admin/minis/mn_clus_acc/add/add_one', 'ClusterController@add');
	// Xoa

	Route::get('/st-admin/minis/mn_clus_acc/del/{id}', 'ClusterController@destroy');
	//------------------------------------------end-------------------------------------------------

	// ---------------------------------University ---------------------------------
	// Show danh sach truong + infor
	Route::get('/st-admin/minis/mn_uni_acc/list', 'UniversityController@get_list');
	// Export University
	Route::get('/st-admin/minis/mn_uni_acc/export', 'UniversityController@export_data');
	// Sua: Lay form sua thong tin
	Route::get('/st-admin/minis/mn_uni_acc/edit/{id}', 'UniversityController@edit');
	// Sua: Post thong tin sua len server
	Route::post('/st-admin/minis/mn_uni_acc/update', 'UniversityController@update');
	// search
	Route::get('/st-admin/minis/mn_uni_acc/search', 'UniversityController@search');
	// Them nhieu $data = {{code,name,info,username,password,email},...}
	Route::post('/st-admin/minis/mn_uni_acc/add/add_many', 'UniversityController@add_many');
	// $data = {university:{code,name,info},user:{username,password,email},...}
	Route::post('/st-admin/minis/mn_uni_acc/add/add_one', 'UniversityController@add');
	// Xoas
	Route::get('/st-admin/minis/mn_uni_acc/del/{id}', 'UniversityController@destroy');
	//------------------------------------------end------------------------------------------------
	//---------------------------------end minister page-------------------------------------------
});

// Filter usertype = cluster
Route::group(array('before' => array('auth', 'cluster')), function () {

	//Filter truoc tuyen sinh
	Route::group(array('before' => 'truoc_tuyen_sinh'), function () {

	});

	//Filter trong tuyen sinh
	Route::group(array('before' => 'trong_tuyen_sinh'), function () {

	});

	//Filter sau tuyen sinh
	Route::group(array('before' => 'sau_tuyen_sinh'), function () {

	});

	// ---------------------------------cluster management page------------------------------------
	Route::get('/st-admin/clus', 'ClusterController@index');
	Route::get('/st-admin/clus/mn_stu_acc', 'ClusterController@manage_student_page');
	Route::get('/st-admin/clus/mn_stu_acc/export_students', 'ClusterController@export_students');
	// Tam thoi cai nay chua chay duoc
	Route::get('/st-admin/clus/mn_stu_acc/export_scores', 'ClusterController@export_scores');
	Route::get('/st-admin/clus/syn_result', 'ClusterController@syn_result');
	//post // not done!!
	// Route::get('/st-admin/clus/mn_stu_acc/add', 'StudentController@add_one');
	Route::get('/st-admin/clus/mn_stu_acc/edit/{id}', 'StudentController@edit_show');
	// data = {'registration_number', 'profile_code', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore',department_id}	
	Route::post('/st-admin/clus/mn_stu_acc/update', 'StudentController@update');
	Route::get('/st-admin/clus/mn_stu_acc/delete/{id}', 'StudentController@destroy');
	Route::get('/st-admin/clus/mn_stu_acc/search', 'ClusterController@mn_clus_search');

	Route::post('/st-admin/clus/mn_stu_acc/score/import','ExamScoreController@update_many');
	Route::get('/st-admin/clus/score','ClusterController@exam_score');
	Route::get('st-admin/clus/score/search','ClusterController@search_score');

	//Quan ly phong thi --- not done
	// K can doan nay vi tich hop vao doan edit cluster
	Route::get('/st-admin/clus/mn_exam_room', 'ExamRoomController@index');
	Route::post('/st-admin/clus/mn_exam_room/add', 'ExamRoomController@add');
	Route::get('/st-admin/clus/mn_exam_room/edit', 'ExamRoomController@edit');
	Route::get('/st-admin/clus/mn_exam_room/delete/{id}', 'ExamRoomController@destroy');

	//------------------------------------------end-------------------------------------------------
});

// Filter usertype = department
Route::group(array('before' => array('auth', 'department')), function () {

	//Filter truoc tuyen sinh
	Route::group(array('before' => 'truoc_tuyen_sinh'), function () {

	});

	//Filter trong tuyen sinh
	Route::group(array('before' => 'trong_tuyen_sinh'), function () {

	});

	//Filter sau tuyen sinh
	Route::group(array('before' => 'sau_tuyen_sinh'), function () {

	});

	//----------------------------------department management page---------------------------------
	Route::get('/st-admin/depart', 'DepartmentController@index');
	// Doan nay k can truyen id cua dept vi lay tu session
	Route::get('/st-admin/depart/mn_stu_acc', 'DepartmentController@manage_student_page');
	// Export students
	Route::get('/st-admin/depart/mn_stu_acc/export_students', 'DepartmentController@export_students');
	Route::get('/st-admin/depart/syn_result', 'DepartmentController@syn_result');
	// data = {'registration_number', 'profile_code', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore',department_id,username,password,email}
	Route::post('/st-admin/depart/mn_stu_acc/add', 'StudentController@add_one');
	// data = {'registration_number', 'profile_code', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore',department_id,username,password,email}
	Route::post('/st-admin/depart/mn_stu_acc/add_many', 'StudentController@add_many');
	Route::get('/st-admin/depart/mn_stu_acc/edit/{id}', 'StudentController@edit_show');
	Route::post('/st-admin/depart/mn_stu_acc/update', 'StudentController@update');
	Route::get('/st-admin/depart/mn_stu_acc/search', 'StudentController@mn_depart_search');
	Route::get('/st-admin/depart/mn_stu_acc/delete/{id}', 'StudentController@destroy');
	//------------------------------------------end-------------------------------------------------
});

// Filter usertype = university
Route::group(array('before' => array('auth', 'university')), function () {

	//Filter truoc tuyen sinh
	Route::group(array('before' => 'truoc_tuyen_sinh'), function () {

	});

	//Filter trong tuyen sinh
	Route::group(array('before' => 'trong_tuyen_sinh'), function () {

	});

	//Filter sau tuyen sinh
	Route::group(array('before' => 'sau_tuyen_sinh'), function () {

	});

	//----------------------------------university management page---------------------------------
	Route::get('/st-admin/uni', 'UniversityController@index');
	Route::get('/st-admin/uni/mn_major', 'UniversityController@manage_major_page');
	// Export majors
	Route::get('/st-admin/uni/mn_major/export_majors', 'UniversityController@export_majors');
	Route::post('/st-admin/uni/mn_major/add', 'MajorController@add');
	Route::post('/st-admin/uni/mn_major/update', 'MajorController@update');
	Route::get('/st-admin/uni/mn_major/edit/{id}', 'MajorController@edit');
	Route::get('/st-admin/uni/mn_major/del/{id}', 'MajorController@destroy');
	Route::get('/st-admin/uni/mn_major/search', 'MajorController@search');
	Route::get('/st-admin/uni/syn_result', 'UniversityController@syn_result');
	//------------------------------------------end-------------------------------------------------
});