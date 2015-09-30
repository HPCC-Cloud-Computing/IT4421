<?php

class Subject extends Eloquent {
	protected $fillable = array('code', 'name', 'time' );

	protected $table = 'subjects';

	public function examroom()
	{
		return $this->belongsTo('ExamRoom');
	}

	public function students()
	{
		return $this->belongsToMany('exam_scores')->withPivot('id','score');
	}

}
