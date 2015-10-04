<?php

class Subject extends Eloquent {
	protected $fillable = array('code', 'name', 'time' );

	protected $table = 'subjects';

	/**
	 * Model subject khong can xay dung moi quan he.
	 */
	//public function examscores()
	//{
		//return $this->haveMany('ExamScore');
	//}

	//public function students()
	//{
		//return $this->belongsToMany('exam_scores')->withPivot('id','score');
	//}

}
