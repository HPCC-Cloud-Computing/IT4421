<?php

class StudentController extends \BaseController {



	public function search()
    {
    	$registration_number = Input::get('registration_number');
    	//$profile_code = Input::get('profile_code');
    	//$lastname = Input::get('lastname');
    	//$firstname = Input::get('firstname');
    	$indentity_code = Input::get('indentity_code');
        


    	if (!is_null($registration_number)){
    		$student= Student::where('registration_number', $registration_number)->get();
    	}
    	elseif (!is_null($indentity_code)) {
    		$Student = Student::where('indentity_code', $indentity_code)->get();
    	}
    	else{
    		return Redirect::back();
    	}

    	$examscores = $student->subjects;

    	return View('check_diem', $examscores);
        //$songs = Song::where('songname','LIKE','%'.$query.'%')->get();
        
    }

	//Hien pop-up giao dien them hs
	public function add_single_student_show()
	{
		//
	}


	//Thuc hien them thong tin 1 hoc sinh
	public function add_single_student()
	{
		$data=Input::all();
		$student = new Student;
		$student->registration_number= $data['reg_number'];
		$student->profile_code = $data['profile_code'];
		$student->lastname = $data['lastname'];
		$student->firstname = $data['firstname'];
		$student->indentity_code = $data['indentity_code'];
		$student->birthday = $data['birthday'];
		$student->sex = $data['sex'];
		$student->plusscore = $data['plusscore']
		$check = $student->push();
		if ($check) {
			return 'true';
		}
		else return 'false';
	}

	//Hien thi pop-up giao dien them nhieu hoc sinh
	public function add_many_student_show()
	{

	}

	//Thuc hien them thong tin nhieu hoc sinh
	public function add_many_student()
	{

	}

	//Hien pop-up sua thong tin 1 hoc sinh
	public function edit_single_student_show()
	{
		$student = Student::find(Input::get('id'));
		return View::make('edit_single_student',$student);
	}

	//Thuc hien sua thong tin 1 hoc sinh
	public function edit_single_student()
	{

		$data=Input::all();
		$student = Student::find($data['id']);
		$student->registration_number= $data['reg_number'];
		$student->profile_code = $data['profile_code'];
		$student->lastname = $data['lastname'];
		$student->firstname = $data['firstname'];
		$student->indentity_code = $data['indentity_code'];
		$student->birthday = $data['birthday'];
		$student->sex = $data['sex'];
		$student->plusscore = $data['plusscore']
		$check = $student->push();
		if ($check) {
			return 'true';
		}
		else return 'false';
	}
	
	//Hien thi pop-up giao dien sua nhieu hoc sinh
	public function edit_many_student_show()
	{

	}

	//Thuc hien sua thong tin nhieu hoc sinh
	public function edit_many_student()
	{

	}

	public function delete_student()
	{
		$data_id = Input::get('id')
		$student = Student::find($data_id);
		$student->delete();

	}




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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//if($response instanceof Illuminate\View\View) {
		$student = Student::find($id);
		$examscores = $student->subject;
		return View::make('student_profile',array('student' => $student, 'examscores' => $examscores));
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
	public function update($id)
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
