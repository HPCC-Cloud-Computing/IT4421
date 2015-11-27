<?php
class MinisterController extends \BaseController {		
	
	public function index(){
		return View::make('st-admin.pages.minis.minis');
	}	
	public function uni_manage_page(){
		$university = University::all();		
		return View::make('st-admin.pages.minis.mn_uni_acc',$university);
	}
	public function dept_manage_page(){
		$depts = Department::all();
		// $depts = array('id' => '2','code'=>'dsafds','name'=>'afefee' );
		return View::make('st-admin.pages.minis.mn_depart_acc')->with('depts',$depts);
	}
	public function cluster_manage_page(){		
		$clusters = Cluster::all();
		return View::make('st-admin.pages.minis.mn_clus_acc',$clusters);
	}
	public function phase_manage_page(){
		$phases = Phase::all();		
		return View::make('st-admin.pages.minis.mn_schedule',$phases);
	}
	public function score_floor_setup_page(){
		return View::make('st-admin.pages.minis.score_floor_setup');
	}
	public function syn_result_page(){
		return View::make('st-admin.pages.minis.syn_result');
	}
	public function test($data){
		foreach ($data as $key => $value) {
			echo( $value);
		}
	}
}
