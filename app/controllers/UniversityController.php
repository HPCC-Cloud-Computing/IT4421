<?php
require_once (dirname(__FILE__).'/Excel/reader.php');
require_once (dirname(__FILE__).'/Utils.php');
class UniversityController extends \BaseController {	
	protected $column = array('code','name','info');		
	
	public function index(){
		return View::make('st-admin.pages.uni.uni');	
	}
	public function manage_major_page(){	
		$id = Session::get('id');	
		return View::make('st-admin.pages.uni.mn_major', 
			array('university' => $university, 'majors' => $this->get_majors($id)));
	}
	public function get_majors($id){
		$university = University::find($id);
		return $university->majors;		
	}
	public function syn_resutl(){
		return View::make('st-admin.pages.uni.syn_result');	
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function get_list()
	{
		$universities = University::all();
		echo ($universities);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * HuanPC
	 * Store a newly created resource in storage.
	 * Store one by one
	 * @return Response
	 */
	public function add()
	{
		$data = Input::get('data');
		if(!isset($data))
			echo "error";
		try{
			$check = University::where('code', $data[0])->first();
			if(isset($check)){
				echo "error";
				exit();	
			}
			$data_insert = array_combine($this->column,$data);			
			$result = University::create($data_insert);		
		}catch(QueryException $e){
			echo "error";
		}	
		if(isset($result))
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
				$check = University::where('code', $value[0])->first();
				if(!isset($check)){
					// Neu chua ton tai thi moi insert
					$data_insert = array_combine($this->column,$value);			
					$result = University::create($data_insert);		
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
		$university = University::find($id);
		return View::make('university_show', $university);
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
	 * HuanPC
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, array $data)
	{
		University::find(intval($id))->update($data);
	}


	/**
	 * HuanPC
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result=University::find(intval($id))->delete();
		if($result>0)
			echo "success";
		else
			echo "failed";
	}


}
