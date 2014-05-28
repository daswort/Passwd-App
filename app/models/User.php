<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
	protected $hidden = array('password');

	protected $guarded = array('id', 'password');

	public function department()
	{
		return $this->belongsTo('Department');
	}

	public function projects()
	{
		return $this->hasMany('Project', 'created_by', 'id');
	}

	public function credentials()
	{
		return $this->hasMany('Credential', 'created_by', 'id');
	}

	public function credentialsAsked() {
		return $this->belongsToMany('Credential', 'asked_by', 'user_id', 'creadential_id');
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

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public static function isLogged()
    {
        if(Session::has('user_id'))
            return true;
        else
    	    return false;
    }

    public static function isAdmin()
    {
        if(Session::get('user_tipo') == 'ADM')
            return true;
        else
            return false;
    }

}