<?php

class MajorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function search($code, $name) {
		// dd($code.' '.$name);
		$major = Major::where('code', 'like', '%' . $code . '%')->orWhere('name', 'like', '%' . $name . '%')->paginate(10);
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

	public function create($data) {
		//data test
		$data = array(
			'code' => 'major_test_2',
			'university_id' => $university_id,
			'name' => 'cntt',
			'target' => '400',
			'condition' => 'tot nghiep thpt loai gioi',
			'info' => 'info_test_2',
		);
		//dieu kien data
		$rule = array(
			'code' => 'required|unique:majors',
			'university_id' => 'required',
		);
		//thong bao khi khong thoa man dieu kien
		$message = array(
			'required' => 'chua dien thong tin',
			'unique' => 'bi trung ma nganh',
		);
		$validator = Validator::make($data, $rule, $message);
		print_r($data);
		if ($validator->passes()) {
			$major = Major::create($data);
			return 'true';
		} else {
			print_r($messages = $validator->messages());
			return 'false';
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
			echo 'success';
			exit();
		}
		echo 'failed';
	}

	//Hien thi giao dien them nganh hoc
	public function add_major_show() {
		# code...
	}

	//Thuc hien them nganh hoc
	public function add_major() {
		//data nhan tu View
		$data = Input::all();
		$check = MajorController::create($data);
	}

	//Hien thi giao dien them nganh hoc
	// public function edit_major_show()
	// {
	// 	$major = Major::find(Input::get('id'));
	// 	return $major;
	// 	# code...
	// }

	// //Thuc hien sua nganh hoc
	// public function edit_major()
	// {
	// 	// $data = Input::all();

	// 	$rule = array(
	// 	        'code' => 'required|unique:majors,code,'.$data['id'],
	// 	        'university_id' => 'required',
	// 		);
	// 	//thong bao khi khong thoa man dieu kien
	// 	$message = array(
	// 			'required' => 'chua dien thong tin',
	// 			'unique' => 'bi trung ma nganh'
	// 		);
	// 	$validator = Validator::make($data,$rule,$message);
	// 	print_r($data);
	// 	if ($validator->passes())
	// 	{
	// 	    MajorController::update($data);
	// 	    return 'true';
	// 	}
	// 	else {
	// 		print_r($messages = $validator->messages());
	// 		return 'false';
	// 	}
	// }

	public function destroy($id) {
		$result = Major::find(intval($id))->delete();
		if ($result > 0) {
			echo "success";
		} else {
			echo "failed";
		}

	}

	public function get_list($id) {
		$university = University::find($id);
		// foreach ($university as $key => $value) {
		// var_dump($university[0]);
		// echo('<br>');
		// echo('<br>');
		// var_dump($university[0]->majors());
		// var_dump($university);
		// }

		$majors = $university->majors;
		$stringHtml = '';
		foreach ($majors as $major) {
			$stringHtml .= '<tr>
			<td>' . $major->code . '</td>
			<td>' . $major->name . '</td>
			<td></td>
			<td>' . $major->target . '</td>
			<td>' . $major->combidation . '</td>
			</tr>';
		}
		echo ($stringHtml);
		// dd($majors);
		// return View::make('pages.majors',['university'=>$university,'majors'=>$majors]);
	}
	public function show($id) {
	}
	public function get_list_uni() {
		$universities = University::all();
		return View::make('pages.majors', array('universities' => $universities));
	}
}