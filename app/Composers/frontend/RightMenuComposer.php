<?php namespace Composers\FrontEnd;
use Post,ReadingPost,Auth,Lesson,Article,Calendar,Session;
class RightMenuComposer {

    public function compose($view) { 
        $view->with('profil',"furkan");
		
		$view->with('lessonMenus',Lesson::where('lang',Session::get('local'))->where('top_lesson',null)->orderBy('id','ASC')->get());
		$view->with('lastArticles',Article::where('lang',Session::get('local'))->limit(4)->orderBy('id','DESC')->get());
		
		$view->with('lastCalenders',Calendar::where('lang',Session::get('local'))->where('date','>=',date("Y-m-d 10:i:s.000000",time()))->limit(5)->orderBy('date','ASC')->get());
		
		
		
		
		
		if (isset(Auth::user()->id)){
		$message_query = Post::where('send_id',Auth::user()->id)->orWhere(function($q){
			$q->where('send_id',0)->where(function($q){
				$q->where('class_id',0)->orWhere('class_id',Auth::user()->class_id);
			});
		})->count();
		$readingCount = ReadingPost::where('user_id',Auth::user()->id)->count();
		$messageCount = $message_query-$readingCount;
		$view->with('messageCount',$messageCount);
		
		
		}
		
    }
}

