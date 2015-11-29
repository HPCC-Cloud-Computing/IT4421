<?php
// require_once (dirname(__FILE__).'/Excel/reader.php');
// require_once (dirname(__FILE__).'/Utils.php');
class DepartmentController extends \BaseController {
	protected $column = array('code','name');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function search($code,$name)
	{
		// dd($code.' '.$name);
		$depts = Department::where('code','like','%'.$code.'%')->orWhere('name','like','%'.$name.'%')->paginate(10);
		return View::make('st-admin.pages.minis.mn_depart_acc')->with('depts',$depts);
	}
	
	public function get_list()
	{
		$depts = Department::all();
		echo($depts);
	}
	public function index(){
		return View::make('st-admin.pages.depart.depart');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add()
	{

		$data = Input::get('data');
		// $data = '{"depart":{"code":"adsf","name":"sdfasdfsd"},"user":{"username":"dfsdf","password":"dsafdsf","email":"43243324"}}';
		$data = json_decode($data,true);
		if(!isset($data))
			echo "error";
		try{
			$department = Department::where('code', $data['depart']['code'])->first();
			if(isset($department)){				
				echo "error";
				exit();	
			}			
			$deptData = array_combine($this->column,$data['depart']);			
			$dept = Department::create($deptData);					
			// $user = $dept->user;	
			$user = new User($data['user']);					
			$dept->user()->save($user);
		}catch(QueryException $e){
			echo "error";
		}	
		if(isset($dept))
			echo "success";
		else 
			echo "error";
	}
	/**
	 * HuanPC
	 * Them nhieu ban ghi vao database tu file exel
	 * @return [type] [description]
	 */
	public function add_many()
	{					
		$fileInputName = 'exel_file';
		$data = Utils::importExelFile($fileInputName);
		$count = 0;
		if(isset($data)){
			foreach ($data as $key => $value) {
				// Kiem tra du lieu da ton tai trong csdl?
				$check = Department::where('code', $value[0])->first();
				if(!isset($check)){
					// Neu chua ton tai thi moi insert
					$data_insert = array_combine($this->column,$value);			
					$result = Department::create($data_insert);		
					if(isset($result)){
						$count +=1;						
					}
				}

			}
		}		
		echo json_encode(array('num_of_insert'=>$count));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$dept = Department::find($id);		
		echo($depts);
	}

	public function get_students($id)
	{
		$dept = Department::find($id);		
		$students = $dept->students;		
		dd($students);
		// return $students ;
	}

	public function manage_student_page($id){		
		// $id = Session::get('dept_id');
		$dept = Department::find($id);
		dd($dept->students);
		// return View::make('st-admin.pages.depart.mn_stu_acc',array('students' => $dept->students));

	}
	public function syn_result(){
		return View::make('st-admin.pages.depart.syn_result');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$dept = Department::find($id);			
		echo json_encode(array('dept'=>$dept,JSON_UNESCAPED_UNICODE));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$data = Input::all();	
		// $data = Input::get('departcode');	
		// echo $data;
		
		// $data = '{"dept":{"id":81,"code":"adsf_new","name":"sdfasdfsd"},"user":{"id":8,"username":"dfsdf_new","password":"dsafdsf","email":"43243324"}}';
		// $data = json_decode($data,true);
		$dept = Department::find(intval($data['id']));
		// print_r($dept);
		// exit();
		$result = $dept->update($data);						
		if($result){			
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result=Department::find(intval($id))->delete();
		if($result>0)
			echo "success";
		else
			echo "failed";
	}


}
