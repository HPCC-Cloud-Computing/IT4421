<?php

class Room extends Eloquent {

	protected $fillable = array('code', 'address' );

	protected $table = 'rooms';


	/**
	 * [cluster description]
	 * @return [model] [Cluster]
	 */
	public function cluster()
	{
		return $this->belongsTo('Cluster', 'id', 'cluster_id');
	}

	/**
	 * [students description]
	 * @return [collecttion] [Students Model]
	 */
	public function students()
	{
		return $this->belongsToMany('Student', 'exam_scores', 'room_id', 'student_id')->withPivot('subject_id', 'score', 'state');
	}

}