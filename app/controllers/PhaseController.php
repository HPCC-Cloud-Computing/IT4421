<?php

class PhaseController extends \BaseController {
	protected $column = array('code', 'name', 'state', 'starttime', 'endtime');
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function edit_show($id)
	{
		$phase = Phase::find($id);
		echo json_encode(array('phase' => $phase, JSON_UNESCAPED_UNICODE));
	}

	public function update()
	{
		$data = Input::all();
		// dd($data);
		$phase = Phase::find(intval($data['id']));
		// dd($phase);
		$result = $phase->update($data);
		if ($result) {
			Session::flash('alert-class', 'alert-success');
			Session::flash('message', 'Cập nhật thành công!!!');			
			echo 'success';
		}else{
			Session::flash('alert-class', 'alert-danger');
			Session::flash('message', 'Đã có lỗi xảy ra, vui lòng thử lại!!!');		
			echo 'failed';
		}
	}
}
