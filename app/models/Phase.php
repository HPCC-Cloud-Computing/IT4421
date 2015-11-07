<?php

class Phase extends Eloquent {

	protected $fillable = array('code', 'name', 'state', 'starttime', 'endtime' );

	protected $table = 'phases';

}