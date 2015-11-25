<?php
require_once (dirname(__FILE__).'/Excel/reader.php');
require_once (dirname(__FILE__).'/Utils.php');
class DepartmentController extends \BaseController {
	protected $column = array('code','name');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
		if(!isset($data))
			echo "error";
		try{
			$department = Department::where('code', $data[0])->first();
			if(isset($department)){
				echo "error";
				exit();	
			}
			$deptData = array_combine($this->column,$data);			
			$dept = Department::create($deptData);		
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
		return View::make('',array('dept' =>$dept ));
	}

	public function get_students($id)
	{
		$dept = Department::with('students')->find($id);		
		$students = $dept->students();		
		return $students ;
	}
	public function manage_student_page(){		
		$id = Session::get('dept_id');
		return View::make('st-admin.pages.depart.mn_stu_acc',array('students' => $this->get_students($id)));
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, array $data)
	{
		Department::find(intval($id))->update($data);
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
