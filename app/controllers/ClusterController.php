<?php
require_once (dirname(__FILE__).'/Excel/reader.php');
require_once (dirname(__FILE__).'/Utils.php');
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
	 * @param  String $fileInputName : input name trong POST
	 * @return boolean 
	 */
	public function storeMany()
	{					
		$fileInputName = 'exel_file';
		$data = Utils::importExelFile($fileInputName);
		if(isset($data)){
			foreach ($data as $key => $value) {
				// Kiem tra du lieu da ton tai trong csdl?
				$cluster = Cluster::where('code', $value[0])->first();
				if(!isset($cluster))
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
