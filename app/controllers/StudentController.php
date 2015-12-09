<?php
// require_once (dirname(__FILE__).'/Excel/reader.php');
// require_once (dirname(__FILE__).'/Utils.php');
class StudentController extends \BaseController {
	protected $column = array('registration_number', 'profile_code', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore');

	public function search() {
		$registration_number = Input::get('registration_number');
		//$profile_code = Input::get('profile_code');
		//$lastname = Input::get('lastname');
		//$firstname = Input::get('firstname');
		$indentity_code = Input::get('indentity_code');

		if (!is_null($registration_number)) {
			$student = Student::where('registration_number', $registration_number)->get();
		} elseif (!is_null($indentity_code)) {
			$Student = Student::where('indentity_code', $indentity_code)->get();
		} else {
			return Redirect::back();
		}

		$examscores = $student->subjects;

		return View('check_diem', $examscores);
		//$songs = Song::where('songname','LIKE','%'.$query.'%')->get();

	}

	public function create($data) {
		// data test
		$data = array(
			'registration_number' => 'BKA01994',
			'profile_code' => 'HY2015001994',
			'lastname' => 'Hoang',
			'firstname' => 'Nhat',
			'indentity_code' => '123456789',
			'birthday' => '01/01/1998',
			'sex' => 'Nam',
			'plusscore' => '1',
		);

		//dieu kien data
		$rule = array(
			'profile_code' => 'required|unique:students',
			'registration_number' => 'required',
			'lastname' => 'required',
			'firstname' => 'required',
			'indentity_code' => 'required|unique:students',
			'birthday' => 'required',
			'sex' => 'required',
			'plusscore' => 'required',
		);
		//thong bao khi khong thoa man dieu kien
		$message = array(
			'required' => 'bat buoc',
			'unique' => 'duy nhat',
		);
		$validator = Validator::make($data, $rule, $message);
		print_r($data);
		if ($validator->passes()) {
			$major = Student::create($data);
			return $result['result'] = true;
		} else {
			$result['result'] = false;
			$result['messages'] = $validator->messages();
			print_r($result);
			return $result;
		}
	}

	public function import_excel_file() {
		$fileInputName = 'exel_file';
		$data = Utils::importExelFile($fileInputName);
		return $data;
	}

	//Thuc hien them thong tin 1 hoc sinh

 public function add_one() {
	  $data = Input::all();
	  if (!isset($data)) {
		   echo "error";	
	  }
	  try {
	   $student = Student::where('code', $data['student']['code'])->first();
	   if (isset($student)) {
		    echo "error";
		    exit();
	   }
		   $studentData = array_combine($this->column, $data['student']);
		   $student = Student::create($studentData);
		   $user = new User($data['user']);
		   $user->password = Hash::make($data['user']['password']);
		   $student->user()->save($user);
	  } catch (QueryException $e) {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');	  	
		   echo "error";
	  }
	  if (isset($student)) {
	  		Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Thêm mới thành công!!!');
		   echo "success";
	  } else {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');	  	
		   echo "error";
	  }
 }
	//Hien thi pop-up giao dien them nhieu hoc sinh
	public function add_many_student_show() {

	}
	public function add_many() {		
		$fileInputName = 'excel_file';
		$data = Utils::importExelFile($fileInputName);
		$count = 0;
		if (isset($data)) {			
			foreach ($data as $key => $value) {
				// dd($value);
				// Kiem tra du lieu da ton tai trong csdl?
				$check = Student::where('registration_number', $value[0])->first();
				if (!isset($check)) {
					// Neu chua ton tai thi moi insert
					$data_insert = array_combine($this->column, array($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8]));						
					$student = Student::create($data_insert);

					$user = new User(array('username'=>$value[9],'password'=>$value[10],'email'=>$value[11]));
					$user->password = Hash::make($value[10]);
					$student->user()->save($user);
					if (isset($student)) {
						$count += 1;
					}
				}

			}
		}
		Session::flash('alert-class', 'alert-success');
		Session::flash('message', 'Thêm mới thành công '.$count.' bản ghi!!');
		echo json_encode('success');
	}

	//Thuc hien them thong tin nhieu hoc sinh
	public function update_many() {
		$fileInputName = 'exel_file';
		$data = Utils::importExelFile($fileInputName);
		$count_create = 0;
		$count_update = 0;
		if (isset($data)) {
			foreach ($data as $key => $value) {
				// Kiem tra du lieu da ton tai trong csdl?
				$exist_student = Student::where('profile_code', $value[1])->first();
				if (!isset($exist_student)) {
					// Neu chua ton tai thi tao record Student moi
					$student = Student::create($value);
					$count_create++;
				} else {
					// Neu da ton tai thi update Student
					$this->update($exist_student);
					$count_update++;
				}
			}
		}
		return array(
			'count_create' => $count_create,
			'count_update' => $count_update,
		);
	}

	//Hien pop-up sua thong tin 1 hoc sinh
	public function edit_show($id) {

		$student = Student::find($id);
		echo json_encode($student);
	}

	//Thuc hien sua thong tin 1 hoc sinh
	public function edit_one()
	{
		// $data = Input::get('data');
		$data = Input::all();
		$student = Student::find(intval($data['id']));
		$result = $this->update($data);
		if($result){
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Cập nhật thành công!!!');			
			echo 'success';
		} else {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');			
			echo 'failed';
		}
	}

	public function update() {
		$data = Input::all();
		$student = Student::find(intval($data['id']));
		// print_r($dept);
		// exit();
		$result = $student->update($data);
		if ($result) {
			// $user = new User($data['user']);
			// $result = $dept->user()->update($data['user']);
			// if($result){
			// print_r($result);
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Cập nhật thành công!!!');
			echo 'success';
			exit();
			// }
		}
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');		
		echo 'failed';
	}

	public function destroy($id) {
		$student = Student::find($id);
		$result = $student->delete();
		if($result){
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Xóa dư liệu thành công!!!');
			echo "success";
		}
		Session::flash('alert-class', 'alert-danger');
		Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');
		echo "delete fail";
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	// public function create($data)
	// {
	// $student = new Student;
	// $student->registration_number= $data['reg_number'];
	// $student->profile_code = $data['profile_code'];
	// $student->lastname = $data['lastname'];
	// $student->firstname = $data['firstname'];
	// $student->indentity_code = $data['indentity_code'];
	// $student->birthday = $data['birthday'];
	// $student->sex = $data['sex'];
	// $student->plusscore = $data['plusscore']
	// $check = $student->push();
	// if ($check) {
	// 	return 'true';
	// }
	// else return 'false';
	// }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//if($response instanceof Illuminate\View\View) {
		$student = Student::find($id);
		$examscores = $student->subject;
		return View::make('student_profile', array('student' => $student, 'examscores' => $examscores));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function update($id)
	// {
	// 	//
	// }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function destroy($id)
	// {
	// 	//
	// }

}