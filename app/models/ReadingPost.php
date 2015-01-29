<?php

class ReadingPost extends Eloquent {

	protected $table = 'readingpost';
	protected $fillable = array('user_id','post_id');
	
	public function users()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public function posts()
	{
		return $this->belongsTo('Post','post_id');
	}
		

}
