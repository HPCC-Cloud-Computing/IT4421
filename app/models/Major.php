c<?php

class Major extends Eloquent {
	protected $fillable = array('id', 'code', 'university_id', 'name', 'target', 'condition', 'info' );

	protected $table = 'majors';


	/**
	 * [university description]
	 * @return [type] [description]
	 */
	public function university()
	{
		$this->belongsTo('University', 'id', 'university_id');
	}

	
	/**
	 * [students description]
	 * @return [type] danh sach sinh vien danh ky
	 */
	public function students()
	{
		$thi->belongsToMany('Student', 'wishs', 'major_id', 'student_id');
	}

	
}