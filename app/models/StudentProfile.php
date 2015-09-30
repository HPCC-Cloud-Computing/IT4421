<?php

class StudentProfile extends Eloquent {

	protected $fillable = array('code', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore' );

	protected $table = 'student_profiles';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function department()
	{
		return $this->hasOne('Department', 'department_id');
	}

	public function cluster()
	{
		return $this->hasOne('Department', 'cluster_id');
	}

}
