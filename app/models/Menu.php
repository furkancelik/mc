<?php

class Menu extends Eloquent {

	protected $table = 'menu';
	protected $fillable = array('top_menu','article_id','name','link','key','lang');
	
	public function parent_menu()
    {
        return $this->belongsTo('Menu', 'top_menu');
    }

	
	public function child_menu()
	{
		return $this->hasMany('Menu', 'top_menu');
	}
	
	public function articles(){
		return $this->belongsTo('Article','article_id');
	}
	
	
	


}
