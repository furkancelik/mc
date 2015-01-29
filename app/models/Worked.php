<?php

class Worked extends Eloquent {

	protected $table = 'worked';
	protected $fillable = array('lesson_id','user_id','time');
	
	public function users()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public function lessons()
	{
		return $this->belongsTo('Lesson','lesson_id');
	}
	
	


}
