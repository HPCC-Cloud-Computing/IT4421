<?php

class ExamRoomController extends \BaseController {
	protected $column = array('code', 'address');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return View::make('');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function add() {
		$data = Input::get('data');
		$data = json_decode($data);
		if (!isset($data)) {
			echo "error";
		}

		try {
			$check = Room::where('code', $data['code'])->first();
			if (isset($check)) {
				echo "error";
				exit();
			}
			$data_insert = array_combine($this->column, $data);
			$result = Room::create($data_insert);
		} catch (QueryException $e) {
			echo "error";
		}
		if (isset($result)) {
			echo "success";
		} else {
			echo "error";
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
