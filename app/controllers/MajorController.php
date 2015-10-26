<?php

class MajorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($university_id)
	{
		$majors = University::find($university_id)->majors()->get();
		return View::make('majors_index',$majors);
	}

	//Hien thi giao dien them nganh hoc
	public function add_major_show()
	{
		# code...
	}

	//Thuc hien them nganh hoc
	public function add_major()
	{
		$data = Input::all();
		$major = new Major;
		$major->code = $data['code'];
		$major->university_id = $data['university_id'];
		$major->name = $data['name'];
		$major->target = $data['target'];
		$major->condition = $data['condition'];
		$major->info = $data['info'];
		$check = $major->push();
		if ($check) return 'true';
		else return 'false';
	}

		//Hien thi giao dien them nganh hoc
	public function edit_major_show()
	{
		$major = Major::find(Input::get('id'));
		return View::make('edit_major',$major);
		# code...
	}

	//Thuc hien sua nganh hoc
	public function edit_major()
	{
		$data = Input::all();
		$major = Major::find($data['id']);
		$major->code = $data['code'];
		$major->university_id = $data['university_id'];
		$major->name = $data['name'];
		$major->target = $data['target'];
		$major->condition = $data['condition'];
		$major->info = $data['info'];
		$check = $major->push();
		if ($check) return 'true';
		else return 'false';
	}

	public function delete_major()
	{
		$major = Major::find(Input::get('id'));
		$major->delete();
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
		$majors = Major::find($id);
		return View::make('major_show', $major);
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
