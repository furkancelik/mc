<?php

class Lesson extends Eloquent {

	protected $table = 'lesson';
	protected $fillable = array('top_lesson','content_id','categories_id','name','link','date','lang','key');
	
	public function parent_lesson()
    {
        return $this->belongsTo('lesson', 'top_lesson');
    }

	
	public function child_lesson()
	{
		return $this->hasMany('lesson', 'top_lesson');
	}
	
	public function contents(){
		return $this->belongsTo('Contents','content_id');
	}
	
	public function categories(){
		return $this->belongsTo('Categories');
	}
	


}
