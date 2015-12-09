<?php
// require_once (dirname(__FILE__).'/Excel/reader.php');
require_once (dirname(__FILE__).'/Utils.php');
class UniversityController extends \BaseController {
	protected $column = array('code', 'name', 'info');

	public function search() {
		$code=Input::get('unicode');
		$name=Input::get('uniname');
		$universitys = University::where('code', 'like', '%' . $code . '%')->where('name', 'like', '%' . $name . '%')->paginate(10);
		return View::make('st-admin.pages.minis.mn_uni_acc')->with('universitys', $universitys);
	}

	public function index() {
		return View::make('st-admin.pages.uni.uni');
	}
	public function manage_major_page() {
		if(Auth::check()){
			$id = Auth::user()->userable_id;
				return View::make('st-admin.pages.uni.mn_major',
								array('majors' => $this->get_majors($id)));
		}
	}
	public function get_majors($id) {
		$university = University::find($id);
		return $university->majors;
	}
	public function export_majors(){
		if (Auth::check()) {
			$uni_id = Auth::user()->userable_id;
			$university = University::find($uni_id);
			$majors = $university->majors;							
			$output_text = 'id,code,university_id,name,target,combination,condition,info'.PHP_EOL;
			foreach ($majors as $key => $value) {			
				$output_text .= $value->id.','.$value->code.','.$value->university_id.','.$value->name.','.$value->target
				.','.$value->combination.','.$value->condition.','.$value->info.PHP_EOL;
			}
			$output_text = mb_convert_encoding($output_text, 'UTF-16LE', 'UTF-8');
			$file_output = Utils::exportCSVFile('Majors_university.csv',$output_text);
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
	public function syn_resutl() {
		return View::make('st-admin.pages.uni.syn_result');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function get_list() {
		$universities = University::all();
		echo ($universities);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

	}

	/**
	 * HuanPC
	 * Store a newly created resource in storage.
	 * Store one by one
	 * @return Response
	 */
	public function add() {

		$data = Input::all();
		// $data = '{"depart":{"code":"adsf","name":"sdfasdfsd"},"user":{"username":"dfsdf","password":"dsafdsf","email":"43243324"}}';
		// $data = json_decode($data, true);
		if (!isset($data)) {
			echo "error";
		}

		try {
			$university = University::where('code', $data['university']['code'])->first();
			if (isset($university)) {
				echo "error";
				exit();
			}
			$universityData = array_combine($this->column, $data['university']);
			$university = University::create($universityData);
			$user = new User($data['user']);
			$user->password = Hash::make($data['user']['password']);
			$university->user()->save($user);
		} catch (QueryException $e) {
			echo "error";
		}
		if (isset($university)) {
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
				// Kiem tra du lieu da ton tai trong csdl?
				$check = University::where('code', $value[0])->first();
				if (!isset($check)) {
					// Neu chua ton tai thi moi insert
					$data_insert = array_combine($this->column, array($value[0],$value[1],$value[2]));						
					$uni = University::create($data_insert);

					$user = new User(array('username'=>$value[3],'password'=>$value[4],'email'=>$value[5]));
					$user->password = Hash::make($value[4]);
					$uni->user()->save($user);
					if (isset($uni)) {
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
		$university = University::find($id);
		return View::make('university_show', $university);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$university = University::find($id);
		echo json_encode(array('university' => $university, JSON_UNESCAPED_UNICODE));
	}

	/**
	 * HuanPC
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
		$university = University::find(intval($data['id']));
		// print_r($dept);
		// exit();
		$result = $university->update($data);
		if ($result) {
			// $user = new User($data['user']);
			// $result = $dept->user()->update($data['user']);
			// if($result){
			// print_r($result);
			echo 'success';
			exit();
			// }
		}
		echo 'failed';
	}

	/**
	 * HuanPC
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$result = University::find(intval($id))->delete();
		if ($result > 0) {
			echo "success";
		} else {
			echo "failed";
		}

	}
	public function export_data(){
		$university = University::all();
		$output_text = 'id,code,name,info'.PHP_EOL;
		foreach ($university as $key => $value) {			
			$output_text .= $value->id.','.$value->code.','.$value->name.','.$value->info.PHP_EOL;
		}
		$output_text = mb_convert_encoding($output_text, 'UTF-16LE', 'UTF-8');
		$file_output = Utils::exportCSVFile('Universities.csv',$output_text);
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
