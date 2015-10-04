<?php

class University extends Eloquent {
	protected $fillable = array('code', 'name', 'info' );

	protected $table = 'universities';

	public function user()
	{
		return $this->morphMany('User', 'userable');
	}

}