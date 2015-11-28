<?php
class MinisterController extends \BaseController {		
	
	public function index(){
		return View::make('st-admin.pages.minis.minis');
	}	
	public function uni_manage_page(){
		$universitys = University::paginate(10);		
		return View::make('st-admin.pages.minis.mn_uni_acc')->with('universitys',$universitys);
	}
	public function dept_manage_page(){
		$depts = Department::paginate(10);
		return View::make('st-admin.pages.minis.mn_depart_acc')->with('depts',$depts);
	}
	public function cluster_manage_page(){		
		$clusters = Cluster::paginate(10);
		return View::make('st-admin.pages.minis.mn_clus_acc')->with('clusters',$clusters);
	}
	public function phase_manage_page(){
		$phases = Phase::paginate(10);		
		return View::make('st-admin.pages.minis.mn_schedule')->with('phases',$phases);
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
