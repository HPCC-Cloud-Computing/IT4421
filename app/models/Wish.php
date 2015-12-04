<?php

class Wish extends Eloquent {

	protected $fillable = array('student_id', 'major_id', 'sumscore');

	protected $table = 'wishs';
}