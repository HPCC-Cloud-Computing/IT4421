<?php

class Student extends Eloquent {

	protected $fillable = array('profile_code', 'lastname', 'firstname', 'indentity_code', 'birthday', 'sex', 'plusscore' );

	protected $table = 'students';

	public function user()
	{
		rreturn $this->morphMany('User', 'userable');
	}

	public function department()
	{
		return $this->belongsTo('Department', 'id', 'department_id');
	}

	public function cluster()
	{
		return $this->belongsTo('Department', 'id', 'cluster_id');
	}

}
