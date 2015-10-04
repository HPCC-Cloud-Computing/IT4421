<?php

class Student extends Eloquent {

	protected $fillable = array('profile_code', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore' );

	protected $table = 'students';

	/**
	 * return Model profile cua user. vi du: Student or University...
	 */
	public function user()
	{	
		//return $this->morphMany('Photo', 'imageable');
		return $this->morphMany('User', 'userable');
	}

	/**
	 * return Department model
	 */
	public function department()
	{
		//return $this->belongsTo('User', 'local_key', 'parent_key');
		return $this->belongsTo('Department', 'id', 'department_id');
	}

	/**
	 * return Cluster model
	 */
	public function cluster()
	{
		//return $this->belongsTo('User', 'local_key', 'parent_key');
		return $this->belongsTo('Cluster', 'id', 'cluster_id');
	}

	public function examscores()
	{	
		//return $this->hasMany('Comment', 'foreign_key', 'local_key');
		return $this->hasMany('ExamScore', 'student_id', 'id');
	}

	/**
	 * hinh nhu sai roi :v
	 * return List of Subject model 
	 */
	public function subjects()
	{	
		//class Userc
		//public function roles()
		//return $this->belongsToMany('Role', 'user_roles', 'user_id', 'foo_id');
		return $this->belongsToMany('Subject', 'exam_scores', 'student_id', 'subject_id')->withPivot('room_id','score','state');
	}

	/**
	 * return list of Room Model
	 */
	public function rooms()
	{
		return $this->belongsToMany('Room', 'exam_scores', 'student_id', 'room_id')->withPivot('subjectc_id','score','state');

	/**
	 * return list of Wish model
	 */
	public function wishs()
	{	
		//return $this->hasMany('Comment', 'foreign_key', 'local_key');
		return $this->hasMany('Wish', 'student_id', 'id');
	}

	/**
	 * Khong ro ham nay co can thiet ko? :v
	 * return list of Universities model
	 */
	public function majors()
	{
		return $this->belongsToMany('Major', 'wishs', 'student_id', 'major_id');
	}


}