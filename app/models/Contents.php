<?php

class Contents extends Eloquent {

	protected $table = 'contents';
	protected $fillable = array('title','content','link','categories_id','lang','key');
	
	public function categories()
	{
		
		return $this->hasOne('Categories','id','categories_id');
	
	}
	
	
	

}
