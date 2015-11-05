<?php
require_once (dirname(__FILE__).'/Excel/reader.php');
require_once (dirname(__FILE__).'/Utils.php');
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
			$universityData = array_combine($this->column,$data);
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
		$fileInputName = 'exel_file';
		$data = Utils::importExelFile($fileInputName);
		if(isset($data)){
			foreach ($data as $key => $value) {
				// Kiem tra du lieu da ton tai trong csdl?
				$university = University::where('code', $value[0])->first();
				if(!isset($university))
					// Neu chua ton tai thi moi insert
					$this->store($value);
			}
		}		
		echo "Success";
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
