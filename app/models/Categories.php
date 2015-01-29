<?php

class Categories extends Eloquent {

	protected $table = 'categories';
	protected $fillable = array('title','link','key','lang');
	

}
