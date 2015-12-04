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

	public function search($code,$name)
	{
		// dd($code.' '.$name);
		$clusters = Cluster::where('code','like','%'.$code.'%')->orWhere('name','like','%'.$name.'%')->paginate(10);
		return View::make('st-admin.pages.minis.mn_clus_acc')->with('clusters',$clusters);
	}

	public function get_list()
	{
		$clusters = Cluster::all();
		echo($clusters);
	}
	public function index(){
		return View::make('st-admin.pages.clus.clus');
	}
	public function manage_student_page(){

		if(Auth::check()){
			$cluster_id = Auth::user()->userable_id;
			$students_data = array();
			$rooms = Cluster::find($cluster_id)->rooms()->get();
			foreach ($rooms as $room) {
				$students_data = array_merge($students_data,$room->students->toArray());
			}
			$students = Paginator::make($students_data, count($students_data), 10);
			// dd($students);
			return View::make('st-admin.pages.clus.mn_stu_acc')->with("students",$students);
		}	
	}
	public function syn_result(){
		if(Auth::check()){
			$id = Auth::user()->userable_id;
			$rooms = Cluster::find($id)->rooms()->get();
			$students = array();
			foreach ($rooms as $room) {
				array_push($students,$room->students);
			}
			// dd($students);			
			// die();
			$major = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0
				,9=>0,10=>0,11=>0,12=>0,13=>0,14=>0
				,15=>0,16=>0,17=>0,18=>0,19=>0,20=>0,21=>0,22=>0
				,23=>0,24=>0,25=>0,26=>0	,27=>0,28=>0
				,29=>0,30=>0);			
			$result = array('1'=>$a=$major,'2'=>$a=$major,'3'=>$a=$major,'4'=>$a=$major);

			foreach ($students as $key => $value) {								
				foreach ($value->examscores as $k => $v) {										
						$result[$v->subject_id][intval($v->score)] =$result[$v->subject_id][intval($v->score)]+1;
				}
			}				
			// tra ve danh sach thong ke diem theo tung nhom nganh			
			return View::make('st-admin.pages.clus.syn_result')->with('result',$result);
		}		
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
		$data = Input::all();	
		// $data = Input::get('departcode');	
		// echo $data;
		
		// $data = '{"dept":{"id":81,"code":"adsf_new","name":"sdfasdfsd"},"user":{"id":8,"username":"dfsdf_new","password":"dsafdsf","email":"43243324"}}';
		// $data = json_decode($data,true);
		$cluster = Cluster::find(intval($data['id']));
		// print_r($dept);
		// exit();
		$result = $cluster->update($data);						
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
		$result=Cluster::find(intval($id))->delete();
		if($result>0)
			echo "success";
		else
			echo "failed";
	}

}
