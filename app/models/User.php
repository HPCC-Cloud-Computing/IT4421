<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = array('username', 'email');

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
	protected $hidden = array('password', 'remember_token', 'role_id', 'profile_id');




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

	public function profile()
	{
		if ($this->role_id == 1)
			return $this->student_profile();
		elseif ($this->role_id == 2) {
			return $this->university();
		}
		elseif ($this->role_id == 3) {
			return $this->cluster();
		}
		elseif ($this->role_id == 4) {
			return $this->department();
		}
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRoleId()
	{
		return $this->role_id;
	}

	public function getProfileId()
	{
		return $this->profile_id;
	}

}
