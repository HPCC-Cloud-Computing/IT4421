<?php
require_once 'Exel/reader.php'
class UniversityController extends \BaseController {

	protected $column = array('code','name','info');
	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$universities = University::all();
		return View::make('university_index', $universities);
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
	public function store($data)
	{		
		if(!isset($data))
			return false;
		try{
			$universityData = array_combine($column,$data);
			$university = University::create($universityData);		
		}catch(QueryException $e){
			return false;
		}	
		if(isset($university))
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
		$university = University::with('mayjor')->find($id);
		$majors = $university->majors;
		return View::make('university_show', array('university' => $university, 'majors' => $majors));
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
		University::find($id)->update($data);
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
		$result=University::where($column[0],'=',$id)->delete();
		if($result>0)
			return true;
		else
			return false;
	}


}
