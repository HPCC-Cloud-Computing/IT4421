<?php
// require_once (dirname(__FILE__).'/Excel/reader.php');
// require_once (dirname(__FILE__).'/Utils.php');
class ClusterController extends \BaseController {
	protected $column = array('code','name');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function get_list()
	{
		$clusters = Cluster::all();
		echo($clusters);
	}
	public function index(){
		return View::make('st-admin.pages.clus.clus');
	}
	public function get_students($id)
	{
		$dept = Cluster::with('students')->find($id);		
		$students = $dept->students();		
		return $students ;
	}
	public function manage_student_page(){		
		$id = Session::get('clusters_id');
		return View::make('st-admin.pages.clus.mn_stu_acc',array('students' => $this->get_students($id)));
	}
	public function syn_result(){
		return View::make('st-admin.pages.clus.syn_result');
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
		// $data = '{"depart":{"code":"adsf","name":"sdfasdfsd"},"user":{"username":"dfsdf","password":"dsafdsf","email":"43243324"}}';
		$data = json_decode($data,true);
		if(!isset($data))
			echo "error";
		try{
			$cluster = Cluster::where('code', $data['cluster']['code'])->first();
			if(isset($cluster)){				
				echo "error";
				exit();	
			}			
			$clusterData = array_combine($this->column,$data['cluster']);			
			$cluster = Cluster::create($cluster);					
			// $user = $dept->user;	
			$user = new User($data['user']);					
			$cluster->user()->save($user);
		}catch(QueryException $e){
			echo "error";
		}	
		if(isset($cluster))
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
				$check = Cluster::where('code', $value[0])->first();
				if(!isset($check)){
					// Neu chua ton tai thi moi insert
					$data_insert = array_combine($this->column,$value);			
					$result = Cluster::create($data_insert);		
					if(isset($result)){
						$count +=1;						
					}
				}

			}
		}		
		echo json_encode( array("num_of_insert"=>$count));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cluster = Cluster::with('Room')->find(intval($id));
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
		$cluster = Cluster::find(intval($id));
		// print_r($cluster->id);
		// print_r($cluster->code);
		// print_r($cluster->name);
		$result1 = array('id' => $cluster->id,'code'=> $cluster->code, 'name'=>$cluster->name);		
		$rooms =  $cluster->rooms;
		$result2 = array();
		foreach ($rooms as $key => $value) {		
			array_push($result2, array('id'=>$value->id,'code'=>$value->code,'address'=>$value->address));
		}				
		$result = array('cluster'=>$result1,'rooms'=>$result2);
		echo(json_encode($result,JSON_UNESCAPED_UNICODE));
		exit();
	}


	/**
	 * HuanPC
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$data = Input::get('data');				
		$data = json_decode($data,true);
		$cluster = Cluster::find(intval($data['cluster']['id']));
		$result = $cluster->update($data['cluster']);						
		if($result){			
			$user = new User($data['user']);
			$result = $cluster->user()->update($data['user']);
			if($result){
				echo 'success';			
				exit();
			}				
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
		$result=Cluster::find(intval($id))->delete();
		if($result>0)
			echo "success";
		else
			echo "failed";
	}

}
