<?php

class Notes extends Eloquent {

	protected $table = 'notes';
	protected $fillable = array('user_id','type','note','info');
	
	
	public function users()
	{
		return $this->belongsTo('User','user_id');
		 
	}
	


}
