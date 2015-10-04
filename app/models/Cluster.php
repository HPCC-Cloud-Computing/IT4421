<?php

class Cluster extends Eloquent {
	protected $fillable = array('code', 'name', );

	protected $table = 'clusters';

	public function user()
	{
		return $this->morphMany('User', 'userable');
	}

	
}
