<?php

class Major extends Eloquent {
	protected $fillable = array('code', 'university_id', 'name', 'target', 'combination', 'condition', 'info');

	protected $table = 'majors';

	public $timestamps = false;

	/**
	 * [university description]
	 * @return [type] [description]
	 */
	public function university() {
		$this->belongsTo('University', 'id', 'university_id');
	}

	/**
	 * [students description]
	 * @return [type] danh sach sinh vien danh ky
	 */
	public function students() {
		$this->belongsToMany('Student', 'wishs', 'major_id', 'student_id')->withPivot('sumscore');
	}

}