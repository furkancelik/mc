<?php namespace Composers\FrontEnd;
use Menu,Lesson,Session;
class MenuComposer {

    public function compose($view) { 
        $view->with('menus',Menu::where('lang',Session::get('local'))->orderBy('id','DESC')->get()->toArray());
		$view->with('lessons',Lesson::where('lang',Session::get('local'))->orderBy('id','ASC')->get());
		
		
		
    }
}

