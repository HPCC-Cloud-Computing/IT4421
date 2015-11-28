<?php

class Cluster extends Eloquent {
	protected $fillable = array('code', 'name');
	public $timestamps = false;
	protected $table = 'clusters';

	/**
	 * [user description]
	 * @return [type] [description]
	 */
	public function user()
	{
		return $this->morphMany('User', 'userable');
	}

	public function rooms()
	{
		return $this->hasMany('Room');
	}

	public function examscores()
	{
		//class Country
		//public function posts()
		//return $this->hasManyThrough('Post', 'User', 'country_id', 'user_id');
		return $this->hasManyThrough('ExamScore', 'Room', 'cluster_id', 'room_id');
	}

}