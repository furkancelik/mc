<?php namespace Composers\BackEnd;

use Post,Auth;

class MenuComposer {

    public function compose($view) {
        $view->with('PostCount',Post::where('send_id','=',Auth::user()->id)->where('reading','=','0')->count());
		$view->with('PostGets', Post::where('send_id','=',Auth::user()->id)->where('reading','=','0')->get());
		$view->with('UserMail', Auth::user()->email);
		
    }
}

