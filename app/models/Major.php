c<?php

class Major extends Eloquent {
	protected $fillable = array('id', 'code', 'university_id', 'name', 'target', 'condition', 'info' );

	protected $table = 'majors';


	public function university()
	{
		$this->belongsTo('University', 'id', 'university_id');
	}

	/**
	 * return danh sach sinh vien danh ky
	 */
	public function students()
	{
		$thi->belongsToMany('Student', 'wishs')
	}

	
}