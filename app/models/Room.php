<?php

class ExamRoom extends Eloquent {

	protected $fillable = array('code', 'address' );

	protected $table = 'examrooms';



	public function subject()
	{
		return $this->belongsTo('Subject','subject_id');
	}
}