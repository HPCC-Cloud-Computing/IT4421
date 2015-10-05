<?php

class Cluster extends Eloquent {
	protected $fillable = array('code', 'name', );

	protected $table = 'clusters';

	/**
	 * [user description]
	 * @return [type] [description]
	 */
	public function user()
	{
		return $this->morphMany('User', 'userable');
	}

	public function students()
	{
		return $this->hasMany('Student', 'cluster-id', 'id');
	}

	public function examscores()
	{
		$students = $this->students();
		foreach ($students as $student) {
			
		}
	}

	
}