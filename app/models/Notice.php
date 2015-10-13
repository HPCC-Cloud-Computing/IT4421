<?php

class Notice extends Eloquent {
	
	protected $fillable = array( 'title', 'content');

	protected $table = 'notices';
}