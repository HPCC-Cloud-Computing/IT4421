<?php

class Wish extends Eloquent {

<<<<<<< HEAD
	protected $fillable = array('student_id', 'major_id','combination_name','number_order', 'sumscore');

	protected $table = 'wishs';
=======
	protected $fillable = array('student_id', 'major_id', 'combination_name', 'number_order', 'sumscore');

	protected $table = 'wishs';

>>>>>>> ed09144ae03d61a0b222580d93b112beefe54e5f
	public $timestamps = false;
}