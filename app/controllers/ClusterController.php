<?php
require_once 'Exel/reader.php'
class ClusterController extends \BaseController {
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
			$clusterData = array_combine($column,$data);
			$cluster = Cluster::create($clusterData);		
		}catch(QueryException $e){
			return false;
		}	
		if(isset($cluster))
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
				$this->store($dataStored);
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
		$cluster = Cluster::with('Room')->find($id);
		$rooms =  $cluster->rooms();
		return View::make('',array('cluster' =>$cluster ,'rooms'=>$rooms ));		
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
		Cluster::find($id)->update($data);
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
		$result=Cluster::where($column[0],'=',$id)->delete();
		if($result>0)
			return true;
		else
			return false;
	}


}
