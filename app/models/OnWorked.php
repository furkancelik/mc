<?php

class OnWorked extends Eloquent {

	protected $table = 'onwork';
	protected $fillable = array('lesson_id','user_id');
	
	public function users()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public function lessons()
	{
		return $this->belongsTo('Lesson','lesson_id');
	}
	
	


}
