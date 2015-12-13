<?php

class WishController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function aspiration_reg() {
		$id = Auth::user()->userable_id;
		$wishes = (Wish::where('student_id',$id)->get());
		if ($wishes->count() > 0) {
			Session::put('isReg','true');
			return View::make('pages.stu.aspiration_reg')->with('wished',$wishes);
		}
		else{
			Session::put('isReg','false');
			return View::make('pages.stu.aspiration_reg');
		}
		
	}

	public function index($student_id) {
		$student = Student::find($student_id);
		$wish_list = $student->wishs()->get();
		return View::make('wishs_index', $wish_list);
	}

	public function add_wish() {
		$data = Input::all();
		$flag = 0;
		foreach ($data['nv'] as $nv) {
			$sumscore = 0;
			if($nv['combi'] != 'null' && $nv['major_id'] != 'null'){
				$combi = DB::table('combinations')->where('name',$nv['combi'])->first();
				$score1 = ExamScore::where('student_id',$nv['student_id'])->where('subject_id',$combi->id_subject1)->first();
				if($score1) $score1 = $score1->score;
				else $score1 = -999;
				$score2 = ExamScore::where('student_id',$nv['student_id'])->where('subject_id',$combi->id_subject2)->first();
				if($score2) $score2 = $score2->score;
				else $score2 = -999;
				$score3 = ExamScore::where('student_id',$nv['student_id'])->where('subject_id',$combi->id_subject3)->first();
				if($score3) $score3 = $score3->score;
				else $score3 = -999;
				$sumscore = $score1 + $score2 + $score3;
				if($sumscore >= 0){
					$wish = new Wish;
					$wish->student_id = $nv['student_id'];
					$wish->major_id = $nv['major_id'];
					$wish->combination_name = $nv['combi'];
					$wish->number_order = $nv['number_order'];
					$wish->sumscore = $sumscore;
					$check = $wish->save();
					if ($check) {
						$flag = 1;
					} else {
						echo 'save error';
						Session::flash('alert-class', 'alert-danger');
						Session::flash('message', 'Da co loi xay ra trong qua trinh dang ky. Vui long nhap lai!!!');
					}	
				}else{
					echo 'chua co diem';
					Session::flash('alert-class', 'alert-danger');
					Session::flash('message', 'Thi sinh chua co du diem de dang ky!!!');
				}			
			}
		}
		if($flag){
			echo 'true';
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Gui dang ky thanh cong!!!');
		}else{
			echo 'false';
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Dang ky khong thanh cong. Vui long nhap lai!!!');			
		}
	}

	public function edit_wish() {
		$data = Input::all();
		$wish = Wish::find($data['id']);
		$wish->student_id = $data['student_id'];
		$wish->major_id = $data['major_id'];
		$wish->sumscore = $data['sumscore'];
		$check = $wish->save();
		if ($check) {
			return 'true';
		} else {
			return 'false';
		}

	}

	public function delete_wish() {
		$wish = Wish::find(Input::get('id'));
		$wish->delete();
	}
}
