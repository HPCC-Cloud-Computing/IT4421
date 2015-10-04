<?php

class Wish extends Eloquent {
	
	protected $fillable = array('id', 'student_id', 'major_id' );

	protected $table = 'wishs';
}