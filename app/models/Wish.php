<?php

class Wish extends Eloquent {

	protected $fillable = array('student_id', 'major_id', 'number_order', 'sumscore');

	protected $table = 'wishs';
}