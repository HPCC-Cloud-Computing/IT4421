<?php

class WishController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($student_id)
	{
		$student = Student::find($student_id);
		$wish_list = $student->wishs()->get();
		return View::make('wishs_index',$wish_list);
	}

	public function add_wish()
	{
		$data = Input::all();
		$wish = new Wish;
		$wish->student_id = $data['student_id'];
		$wish->major_id = $data['major_id'];
		$wish->sumscore = $data['sumscore'];
		$check = $wish->save();
		if($check) return 'true';
		else return 'false';
	}

	public function edit_wish()
	{
		$data = Input::all();
		$wish = Wish::find($data['id']);;
		$wish->student_id = $data['student_id'];
		$wish->major_id = $data['major_id'];
		$wish->sumscore = $data['sumscore'];
		$check = $wish->save();
		if($check) return 'true';
		else return 'false';
	}

	public function delete_wish()
	{
		$wish = Wish::find(Input::get('id'));
		$wish->delete();
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
	public function add()
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
