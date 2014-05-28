<?php

class Credential extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'credentials';

	protected $guarded = array('id', 'passwd', 'url', 'user');

	public function project() 
	{
		return $this->belongTo('Project');
	}

	public function user()
	{
		return $this->belongTo('User');
	}

	public function userWhoAsked()
	{
		return $this->belongsToMany('User', 'asked_by', 'credential_id', 'user_id');
	}

}