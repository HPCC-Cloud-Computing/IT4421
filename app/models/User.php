<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'users';

	public $timestamps = false;
	
	protected $fillable = array('username', 'email');

	protected $guarded = array('id', 'password');

	protected $hidden = array('password', 'remember_token', 'userable_id', 'userable_type');

	public static $rules_login = array(
		'username' => 'required|alpha_num|between:3,32',
		'password' => 'required|alpha_num|between:6,64',
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function isAdmin() {
		return ($this->getUserableType() == 'admin');
	}

	public function userable() {
		return $this->morphTo();
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->password;
	}

	/**
	 * Get userable_id
	 */
	public function getUserableId() {
		return $this->userable_id;
	}

	/**
	 * Get userable_type
	 */
	public function getUserableType() {
		return $this->userable_type;
	}
	public function getUser() {

		$array = array('username' => $this->username, 'id' => $this->id, 'password' => $this->password, 'email' => $this->email);
		return $array;
	}
}
