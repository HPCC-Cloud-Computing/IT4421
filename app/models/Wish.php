<?php

class Wish extends Eloquent {

	protected $fillable = array('student_id', 'major_id','combination_name','number_order', 'sumscore');

	protected $table = 'wishs';
	
	public $timestamps = false;
}