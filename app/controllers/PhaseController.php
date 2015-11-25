<?php

class PhaseController extends \BaseController {
	protected $column = array('code', 'name', 'state', 'starttime', 'endtime' );
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
	public function create($data)
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add($data)
	{
		if(!isset($data))
			return false;
		try{
			$phaseData = array_combine($column,$data);
			$phase = Phase::create($clusterData);		
		}catch(QueryException $e){
			return false;
		}	
		if(isset($phase))
			return true;
		else 
			return false;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	public function update($id,$data)
	{
		if(isset($data)){
			Phase::find($id)->update($data);
		}					
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result=Phase::where($column[0],'=',$id)->delete();
		if($result>0)
			return true;
		else
			return false;
	}
	/**
	 * Thiet lap cac moc thoi gian
	 */
	public function createTimeline(){
		return false;
	}
	/**
	 * Thay doi cac moc thoi gian
	 */
	public function updateTimeline(){
		return false;
	}
	/**
	 * Thiet lap trang thai
	 */
	public function createStates(){
		return false;
	}
	/**
	 * Thay doi trang thai
	 */
	public function updateStates(){
		return false;
	}
	/**
	 * Thiet lap diem san
	 */
	public function createFloorScore(){
		return false;
	}
}
