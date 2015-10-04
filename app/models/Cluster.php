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

	
}
