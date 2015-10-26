<?php
require_once 'Exel/reader.php'
class DepartmentController extends \BaseController {
	protected $column = array('code','name');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store()
	{
		if(!isset($data))
			return false;
		try{
			$deptData = array_combine($column,$data);
			$dept = Department::create($universityData);		
		}catch(QueryException $e){
			return false;
		}	
		if(isset($dept))
			return true;
		else 
			return false;
	}
	/**
	 * HuanPC
	 * Them nhieu ban ghi vao database tu file exel
	 * @return [type] [description]
	 */
	public function storeMany()
	{
		
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$data->read('*.xls');
		for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
			$dataStored =array();
			for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
				array_push($dataStored,$data->sheets[0]['cells'][$i][$j]);				
			}
			if(count($data)>0){
				store($dataStored);
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$dept = Department::with('students')->find($id);		
		$students = $dept->students();		
		return View::make('',array('dept' =>$dept ,'students'=>$students ));
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
		Department::find($id)->update($data);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result=Department::where($column[0],'=',$id)->delete();
		if($result>0)
			return true;
		else
			return false;
	}


}
