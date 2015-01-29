<?php

class DeletePost extends Eloquent {

	protected $table = 'deletepost';
	protected $fillable = array('post_id','user_id');
	
	public function users()
	{
		return $this->belongsTo('User','user_id');
	}
	
	public function posts()
	{
		return $this->belongsTo('Post','post_id');
	}
		

}
