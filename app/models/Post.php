<?php

class Post extends Eloquent {

	protected $table = 'posts';
	protected $fillable = array('send_id','user_id','subject','message');
	
	public function users()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public function send()
	{
		return $this->belongsTo('User','send_id');
	}
	
	public function classes()
	{
		return $this->belongsTo('Classes','class_id');
	}
	
	public function readingpost()
	{
		return $this->belongsTo('ReadingPost','id','post_id');
	}
	
	public function deletepost()
	{
		return $this->belongsTo('DeletePost','id','post_id');
	}
	

}
