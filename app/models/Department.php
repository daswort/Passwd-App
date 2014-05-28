<?php

class Department extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

	protected $guarded = array('id');

	public function users() 
	{
		return $this->hasMany('User');
	}

}