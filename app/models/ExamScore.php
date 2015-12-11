<?php

class ExamScore extends Eloquent {
	protected $fillable = array('student_id', 'room_id', 'subject_id', 'score', 'state');

	protected $table = 'exam_scores';

	public function students() {
		return $this->belongsToMany('Student');
	}

}