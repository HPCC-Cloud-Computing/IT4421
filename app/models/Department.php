<?php

class Department extends Eloquent {
	protected $fillable = array('code', 'name', );

	protected $table = 'departments';

	/**
	 * [user description]
	 * @return [type] [description]
	 */
	public function user()
	{
		return $this->morphMany('User', 'userable');
	}
	
}