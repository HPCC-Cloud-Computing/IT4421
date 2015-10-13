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
