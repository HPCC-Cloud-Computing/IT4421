<?php
require_once (dirname(__FILE__).'/Excel/reader.php');
require_once (dirname(__FILE__).'/Utils.php');
class DepartmentController extends \BaseController {
	protected $column = array('code', 'name');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function search() {
		$code=Input::get('departcode');
		$name=Input::get('departname');
		$depts = Department::where('code', 'like', '%' . $code . '%')->where('name', 'like', '%' . $name . '%')->paginate(10);
		return View::make('st-admin.pages.minis.mn_depart_acc')->with('depts', $depts);
	}

	public function get_list() {
		$depts = Department::all();
		echo ($depts);
	}
	public function export_data(){
		$depts = Department::all();
		$output_text = 'id,code,name'.PHP_EOL;
		foreach ($depts as $key => $value) {			
			$output_text .= $value->id.','.$value->code.','.$value->name.PHP_EOL;
		}
		// echo ($output_text);
		$output_text = mb_convert_encoding($output_text, 'UTF-16LE', 'UTF-8');
		$file_output = Utils::exportCSVFile('Departments.csv',$output_text);
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
	public function export_students(){
		if (Auth::check()) {
			$dept_id = Auth::user()->userable_id;
			$dept = Department::find($dept_id);
			$students = $dept->students;		
			$output_text = 'id,registration_number,profile_code,lastname,firstname,indentity_code,birthday,sex,plusscore'.PHP_EOL;
			foreach ($student as $key => $value) {			
				$output_text .= $value->id.','.$value->registration_number.','.$value->profile_code.','.
				$value->lastname.','.$value->firstname.','.$value->indentity_code.','.$value->birthday.','.$value->sex.','.$value->plusscore.PHP_EOL;
			}
			// echo ($output_text);
			$output_text = mb_convert_encoding($output_text, 'UTF-16LE', 'UTF-8');
			$file_output = Utils::exportCSVFile('Student_Dept.csv',$output_text);
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
	public function index() {
		return View::make('st-admin.pages.depart.depart');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add() {

		$data = Input::all();
		// $data = '{"depart":{"code":"adsf","name":"sdfasdfsd"},"user":{"username":"dfsdf","password":"dsafdsf","email":"43243324"}}';
		if (!isset($data)) {
			echo "error";
		}

		try {
			$department = Department::where('code', $data['depart']['code'])->first();
			if (isset($department)) {
				echo "error";
				exit();
			}
			$deptData = array_combine($this->column, $data['depart']);
			$dept = Department::create($deptData);
			// $user = $dept->user;
			$user = new User($data['user']);
			$user->password = Hash::make($data['user']['password']);
			$dept->user()->save($user);
		} catch (QueryException $e) {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lôi xảy ra, vui lòng thử lại!!!');
			echo "error";
		}
		if (isset($dept)) {
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Thêm mới thành công!!!');
			echo "success";
		} else {
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lôi xảy ra, vui lòng thử lại!!!');
			echo "error";
		}

	}
	/**
	 * HuanPC
	 * Them nhieu ban ghi vao database tu file exel
	 * @return [type] [description]
	 */
	public function add_many() {
		$fileInputName = 'excel_file';
		$data = Utils::importExelFile($fileInputName);
		$count = 0;
		if (isset($data)) {			
			foreach ($data as $key => $value) {
				// dd($value);
				// Kiem tra du lieu da ton tai trong csdl?
				$check = Department::where('code', $value[0])->first();
				if (!isset($check)) {
					// Neu chua ton tai thi moi insert
					$data_insert = array_combine($this->column, array($value[0],$value[1]));						
					$dept = Department::create($data_insert);

					$user = new User(array('username'=>$value[2],'password'=>$value[3],'email'=>$value[4]));
					$user->password = Hash::make($value[3]);
					$dept->user()->save($user);
					if (isset($dept)) {
						$count += 1;
					}
				}

			}
		}
		Session::flash('alert-class', 'alert-success');
		Session::flash('message', 'Thêm mới thành công '.$count.' bản ghi!!');
		echo json_encode('success');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$dept = Department::find($id);
		echo ($depts);
	}

	public function get_students($id) {
		$dept = Department::find($id);
		$students = $dept->students;
		dd($students);
		// return $students ;
	}

	public function manage_student_page() {
		// $id = Session::get('dept_id');
		if (Auth::check()) {
			$id = Auth::user()->userable_id;
			$dept = Department::find($id)->students->toArray();

		    $perPage = 10;   
		    $page = Input::get('page', 1);
		    if ($page > count($dept) or $page < 1) { $page = 1; }
		    $offset = ($page * $perPage) - $perPage;
		    $datas = array_slice($dept,$offset,$perPage);
			$students = Paginator::make($datas, count($dept), $perPage);
			// dd($students);
			return View::make('st-admin.pages.depart.mn_stu_acc')->with('students', $students);
		}

	}
	public function syn_result() {
		if (Auth::check()) {
			$id = Auth::user()->userable_id;

			$students = Department::find($id)->students;			
			$subject_frequent = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0
				,9=>0,10=>0);			
			$result = array('1'=>$a=$subject_frequent,'2'=>$a=$subject_frequent,'3'=>$a=$subject_frequent,'4'=>$a=$subject_frequent,
				'5'=>$a=$subject_frequent,'6'=>$a=$subject_frequent,'7'=>$a=$subject_frequent,'8'=>$a=$subject_frequent);

			foreach ($students as $key => $value) {								
				foreach ($value->examscores as $k => $v) {										
						$result[$v->subject_id][intval($v->score)] =$result[$v->subject_id][intval($v->score)]+1;
				}
			}
			// tra ve danh sach thong ke diem theo tung nhom nganh
			return View::make('st-admin.pages.depart.syn_result')->with('result', $result);
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		$dept = Department::find($id);
		echo json_encode(array('dept' => $dept, JSON_UNESCAPED_UNICODE));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update() {
		$data = Input::all();
		// $data = Input::get('departcode');
		// echo $data;

		// $data = '{"dept":{"id":81,"code":"adsf_new","name":"sdfasdfsd"},"user":{"id":8,"username":"dfsdf_new","password":"dsafdsf","email":"43243324"}}';
		// $data = json_decode($data,true);
		$dept = Department::find(intval($data['id']));
		// print_r($dept);
		// exit();
		$result = $dept->update($data);
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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$result = Department::find(intval($id))->delete();
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

}
