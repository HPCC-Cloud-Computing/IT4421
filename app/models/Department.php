<?php

class Department extends Eloquent {
	protected $fillable = array('code', 'name', );
	public $timestamps = false;
	protected $table = 'departments';

	/**
	 * [user description]
	 * @return [type] [description]
	 */
	public function user($id)
	{
		$user = User::where('userable_id','=',intval($id));
		return $user;
	}
	
}