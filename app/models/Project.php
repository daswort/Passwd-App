<?php

class Project extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';

	protected $guarded = array('id');

	public function credentials() 
	{
		return $this->hasMany('Credential');
	}

	public function user()
	{
		return $this->belongTo('User');
	}

}