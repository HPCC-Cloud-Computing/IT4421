<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = array('name', 'email','role_id','profile_id');

	protected $guarded = array('id', 'password');
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');





	public function student_profile()
	{
		return $this->hasOne('StudentProfile', 'profile_id');
	}

	public function university()
	{
		return $this->hasOne('University', 'profile_id');
	}

	public function cluster()
	{
		return $this->hasOne('Cluster', 'profile_id');
	}

	public function department()
	{
		return $this->hasOne('Department', 'profile_id');
	}

}
