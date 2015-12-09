<?php

class MajorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function search() {
		$code=Input::get('majorcode');
		$name=Input::get('majorname');
		$major = Major::where('code', 'like', '%' . $code . '%')->where('name', 'like', '%' . $name . '%')->paginate(10);
		return View::make('st-admin.pages.uni.mn_major',
			array('majors' => $major));
	}

	public function index() {
		// $university_id = Input::get('university_id');
		if (Session::get('university_id') !== null) {
			$university_id = Session::get('university_id');
			$majors = University::find($university_id)->majors()->get();
			foreach ($majors as $major) {
				echo ($major->code) . "\n";
			}
		}
		// return View::make('majors_index',$majors);
		else {
			return Redirect::to('/');
		}

	}

	public function add()
	{
		$data = Input::all();
		if (!isset($data)) {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');	
			echo "error";
		}
		try {
			$major = Major::where('code', $data['code'])->first();
			if (isset($major)) {
				Session::flash('alert-class', 'alert-danger');
				Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');	
				echo "error";
				exit();
			}
			$major = Major::create($data);
		} catch (QueryException $e) {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');	
			echo "error";
		}
		if (isset($major)) {
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Thêm mới thành công!!!!!!');
			echo "success";
		} else {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');	
			echo "error";
		}
	}

	public function edit($id) {
		$major = Major::find($id);
		echo json_encode(array('major' => $major, JSON_UNESCAPED_UNICODE));
	}

	public function update() {
		$data = Input::all();
		$major = Major::find(intval($data['id']));
		$result = $major->update($data);
		if ($result) {
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Cập nhật thành công!!!');			
			echo 'success';
			exit();
		}
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');		
		echo 'failed';
	}


	public function destroy($id) {
		$result = Major::find(intval($id))->delete();
		if ($result > 0) {
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Xóa dư liệu thành công!!!');
			echo "success";
		} else {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');
			echo "failed";
		}

	}

	public function get_list($id) {
		$university = University::find($id);
		$majors = $university->majors;
		echo json_encode(array('majors' => $majors, JSON_UNESCAPED_UNICODE)); 
	}
	public function show($id) {
	}
	public function get_list_uni() {
		$universities = University::all();
		return View::make('pages.majors', array('universities' => $universities));
	}
}