<?php
// require_once (dirname(__FILE__).'/Excel/reader.php');
// require_once (dirname(__FILE__).'/Utils.php');
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
			echo "success";
		} else {
			echo "error";
		}

	}
	/**
	 * HuanPC
	 * Them nhieu ban ghi vao database tu file exel
	 * @return [type] [description]
	 */
	public function add_many() {
		$fileInputName = 'exel_file';
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
		echo json_encode(array('num_of_insert' => $count));
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

}
