<?php

class Favorite extends Eloquent {

	protected $table = 'favorite';
	protected $fillable = array('user_id','lesson_id');
	
	public function users()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public function lessons()
	{
		return $this->belongsTo('Lesson','lesson_id');
	}
	
	


}
