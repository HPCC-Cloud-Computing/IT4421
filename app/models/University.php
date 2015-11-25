<?php

class University extends Eloquent {
	protected $fillable = array('code', 'name', 'info' );
	// protected $timestamps = false;
	protected $table = 'universities';

	public function getAll(){
		return $this->all();	
	}
	/**
	 * [user description]
	 * @return [type] [description]
	 */
	public function user()
	{
		return $this->morphMany('User', 'userable');
	}

	/**
	 * [majors description]
	 * @return [type] [description]
	 */
	public function majors()
	{
		return $this->hasMany('Major', 'university_id', 'id');
	}

	/**
	 * [wishs description]
	 * @return [type] [description]
	 */
	public function wishs()
	{
		return $this->hasManyThrough('Wish', 'Major', 'university_id', 'major_id');
	}

	
}