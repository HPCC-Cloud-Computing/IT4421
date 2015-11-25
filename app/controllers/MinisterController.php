<?php
class MinisterController extends \BaseController {		
	
	public function index(){
		return View::make('st-admin.pages.minis.minis');
	}	
	public function uniManagePage(){
		return View::make('st-admin.pages.minis.mn_uni_acc');
	}
	public function deptManagePage(){
		return View::make('st-admin.pages.minis.mn_depart_acc');
	}
	public function clusterManagePage(){
		return View::make('st-admin.pages.minis.mn_clus_acc');
	}
	public function phaseManagePage(){
		return View::make('st-admin.pages.minis.mn_schedule');
	}
	public function scoreFloorSetupPage(){
		return View::make('st-admin.pages.minis.score_floor_setup');
	}
	public function synResultPage(){
		return View::make('st-admin.pages.minis.syn_result');
	}
}
