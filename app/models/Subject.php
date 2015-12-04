<?php

class Subject extends Eloquent {
	protected $fillable = array('code', 'name', 'time');

	protected $table = 'subjects';

	/**
	 * Model subject khong can xay dung moi quan he.
	 */
	//public function examscores()
	//{
	//return $this->haveMany('ExamScore');
	//}

	public function students() {
		return $this->belongsToMany('Student', 'exam_scores', 'subject_id', 'student_id')->withPivot('room_id', 'score', 'state');
	}

}
