<?php
// require_once (dirname(__FILE__).'/Excel/reader.php');
// require_once (dirname(__FILE__).'/Utils.php');
class ExamScoreController extends \BaseController {
	protected $column = array('student_id', 'room_id', 'subject_id', 'score', 'state' );
	
	public function show_page(){
		return View::make('pages.result_info');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$student_id = Input::get('student_id');
		$score = Student::find($student_id)->examscores()->get();
		$result = json_encode($score);
		return $result; 
	}

	public function import_excel_file()
	{					
		$fileInputName = 'examscore_exel_file';
		$data = Utils::importExelFile($fileInputName);
		return $data;
	}

	public function edit_one_show()
	{
		$student_id = Input::get('student_id');
		$score = Student::find($student_id)->examscores()->get();
		$result = json_encode($score);
		return $result;
	}

	public function edit_one()
	{
		$data = Input::all();
		$examscore = $this->update($data);
		return json_encode($examscore); 
	}

	public function update_many()
	{
		$fileInputName = 'exel_file';
		$data = Utils::importExelFile($fileInputName);
		$count_create = 0; $count_update = 0;
		if(isset($data)){
			foreach ($data as $key => $value) {
				// Kiem tra du lieu da ton tai trong csdl?
				$exist_score = ExamScore::where('student_id', $value[0])->where('subject_id',$value[2])->first();
				if(!isset($exist_score)){
					// Neu chua ton tai thi tao record examscore moi
					$examscore = ExamScore::create($value);
					$count_create++;
				}					
				else{
					// Neu da ton tai thi update Student
					$check_update = $this->update($exist_score);
					if($check_update) $count_update++;
				}					
			}
		}
		return json_encode(array(
					'count_create' => $count_create,
					'count_update' => $count_update
				));	
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update($data)
	{
		$examscore = ExamScore::find($data['id']);
		$examscore->student_id = $data['student_id'];
		$examscore->room_id = $data['room_id'];
		$examscore->subject_id = $data['subject_id'];
		$examscore->score = $data['score'];
		$examscore->state = $data['state'];
		$check = $examscore->push();
		if ($check) {
			return True;
		}
		else return False;
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
