<?php
// require_once (dirname(__FILE__).'/Excel/reader.php');
// require_once (dirname(__FILE__).'/Utils.php');
class StudentController extends \BaseController {
	protected $column = array('profile_code','registration_number', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore','department_id');

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
	public function mn_depart_search(){
		$code=Input::get('stunumber');
		$name=Input::get('stuid');
		$students = Student::where('registration_number', 'like', '%' . $code . '%')->where('indentity_code', 'like', '%' . $name . '%')->paginate(10);
		return View::make('st-admin.pages.depart.mn_stu_acc')->with('students', $students);
	}
	// public function mn_clus_search(){
	// 	dd(Input::all());
	// 	$code=Input::get('stunumber');
	// 	$name=Input::get('stuid');
	// 	$students = Student::where('registration_number', 'like', '%' . $code . '%')->where('indentity_code', 'like', '%' . $name . '%')->paginate(10);
	// 	return View::make('st-admin.pages.clus.mn_stu_acc')->with('students', $students);
	// }
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
	   $exist_student = Student::where('profile_code', $data['student']['profile_code'])->first();
	   // dd($exist_student);
	   if ($exist_student!=null) {
		    echo "error";
		    // dd($exist_student);
		    Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');
			// dd(Session::has('message'));
			// exit();
	   }else{
			$studentData = array_combine($this->column, $data['student']);
		   	$student = Student::create($studentData);
		   	$user = new User($data['user']);
		   	$user->password = Hash::make($data['user']['password']);
		   	$check = $student->user()->save($user);
			if ($check) {
		  		Session::flash('alert-class', 'alert-success');
				Session::flash('message', 'Thêm mới thành công!!!');
			   echo "success";
			} else {
				Session::flash('alert-class', 'alert-danger');
				Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');	  	
			   echo "error";
			}
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
			// }
		}else{
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');		
			echo 'failed';
		}
	}

	public function destroy($id) {
		$student = Student::find($id);
		// dd($id);
		$result = $student->delete();
		if($result){
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Xóa dư liệu thành công!!!');
			echo "success";
		}else{
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');
			echo "delete fail";
		}
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
	
	public function export_data(){
		$student = Student::all();
		$output_text = 'id,registration_number,profile_code,lastname,firstname,indentity_code,birthday,sex,plusscore'.PHP_EOL;
		foreach ($student as $key => $value) {			
			$output_text .= $value->id.','.$value->registration_number.','.$value->profile_code.','
			.$value->lastname.','.$value->firstname.','.$value->indentity_code.','.$value->birthday.','.$value->sex.','.$value->plusscore.PHP_EOL;
		}
		// echo ($output_text);
		$output_text = mb_convert_encoding($output_text, 'UTF-16LE', 'UTF-8');
		$file_output = Utils::exportCSVFile('Student.csv',$output_text);
		if (file_exists($file_output)) {
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename="'.basename($file_output).'"');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file_output));
		    readfile($file_output);
		    exit;
		}
	}

}