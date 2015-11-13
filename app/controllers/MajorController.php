<?php

class MajorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $university_id = Input::get('university_id');
		if(isset(Session::get('university_id'))) 
			$university_id = Session::get('university_id');
			$majors = University::find($university_id)->majors()->get();
			foreach ($majors as $major) {
				echo ($major->code)."\n";
			}
			// return View::make('majors_index',$majors);
		else return Redirect::to('/');
	}

	public function create($data)
	{
		//data test
		$data = array(
				'code' => 'major_test_2',
				'university_id' => $university_id,
				'name' => 'cntt',
				'target' => '400',
				'condition' => 'tot nghiep thpt loai gioi',
				'info' => 'info_test_2'
			); 
		//dieu kien data
		$rule = array(
		        'code' => 'required|unique:majors',
		        'university_id' => 'required',
			);
		//thong bao khi khong thoa man dieu kien
		$message = array(
				'required' => 'chua dien thong tin',
				'unique' => 'bi trung ma nganh'
			);
		$validator = Validator::make($data,$rule,$message);
		print_r($data);
		if ($validator->passes())
		{
		    $major = Major::create($data);
		    return 'true';
		}
		else {
			print_r($messages = $validator->messages());
			return 'false';
		}
	}

	public function update($data)
	{
		$major = Major::find($data['id']);
		$major->code = $data['code'];
		$major->university_id = $data['university_id'];
		$major->name = $data['name'];
		$major->target = $data['target'];
		$major->condition = $data['condition'];
		$major->info = $data['info'];
		$check = $major->push();
		if ($check) return 'true';
		else return 'false';
	}

	//Hien thi giao dien them nganh hoc
	public function add_major_show()
	{
		# code...
	}

	//Thuc hien them nganh hoc
	public function add_major()
	{
		//data nhan tu View
		$data = Input::all();
		$check = MajorController::create($data);
	}

		//Hien thi giao dien them nganh hoc
	public function edit_major_show()
	{
		$major = Major::find(Input::get('id'));
		return $major;
		# code...
	}

	//Thuc hien sua nganh hoc
	public function edit_major()
	{
		// $data = Input::all();

		$data = array(
					'id' => 14,
					'code' => 'major_test_3',
					'university_id' => $university_id,
					'name' => 'cntt',
					'target' => '400',
					'condition' => 'tot nghiep thpt loai gioi',
					'info' => 'info_test_2'
				); 
			//dieu kien data
		$rule = array(
		        'code' => 'required|unique:majors,code,'.$data['id'],
		        'university_id' => 'required',
			);
		//thong bao khi khong thoa man dieu kien
		$message = array(
				'required' => 'chua dien thong tin',
				'unique' => 'bi trung ma nganh'
			);
		$validator = Validator::make($data,$rule,$message);
		print_r($data);
		if ($validator->passes())
		{
		    MajorController::update($data);
		    return 'true';
		}
		else {
			print_r($messages = $validator->messages());
			return 'false';
		}
	}


	public function delete_major($university_id)
	{
		$major = Major::find(Input::get('id'));
		$major->delete();
	}
}