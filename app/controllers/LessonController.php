<?php

class LessonController extends BaseController {


	public function index()
	{
		$veriler = Lesson::where('lang',Session::get('local'))->orderBy('id','ASC')->get();
		return View::make('frontend.lesson.index',compact('veriler'))->with('title',Lang::get('title.lesson'));
	}
	
	
	public function show($id,$name)
	{
		Session::put('start_time',time());
		$veri = Lesson::where('lang',Session::get('local'))->where('key',$id)->first();

		$veriler = Lesson::where('lang',Session::get('local'))->where('key',$veri->id)->orWhere('top_lesson',$veri->id)->orWhere('top_lesson',$veri->id)->get();
		
		
		if ($veri->categories_id>0){
			$contents = Contents::where('lang',Session::get('local'))->where('categories_id',$veri->categories_id)->get();
		}elseif($veri->content_id>0) {
			$contents = Contents::where('lang',Session::get('local'))->where('id',$veri->content_id)->get();
		}else {
			$contents = array();
		}
		if (isset(Auth::user()->id)){
		 if (OnWorked::where('user_id',Auth::user()->id)->where('lesson_id',$veri->id)->count()>0){ $onworked = true;}else{$onworked=false; }
		 if (Favorite::where('user_id',Auth::user()->id)->where('lesson_id',$veri->id)->count()>0){ $favorite = true;}else{$favorite=false; }
		}else {  $onworked=false;  $favorite=false; }
		$lessons = Lesson::where('lang',Session::get('local'))->where("top_lesson",'>','0')->orderByRaw('RAND()')->limit(6)->get();
		return View::make('frontend.lesson.show',compact('veriler','veri','contents','lessons'))->with('title',$veri->name)->with('onworked',$onworked)->with('favorite',$favorite);
	}
	
	
	public function addonworked()
	{ 
		if (OnWorked::where('user_id',Auth::user()->id)->where('lesson_id',Input::get('id'))->count()<1){
			try{
				OnWorked::create(array('user_id'=>Auth::user()->id,'lesson_id'=>Input::get('id')));
				return 'true';
			}catch(Exception $e){
				return 'false';
			}
		}
	}
	
	
	
	public function deleteonworked()
	{ 
		
			try{
				OnWorked::where('user_id',Auth::user()->id)->where('lesson_id',Input::get('id'))->delete();
				return 'true';
			}catch(Exception $e){
				return 'false';
			}
		
	}
	
	
	public function deletefavorite()
	{
		try{
			Favorite::where('user_id',Auth::user()->id)->where('lesson_id',Input::get('id'))->delete();
				return 'true';
			}catch(Exception $e){
				return 'false';
			}
	}
	
	public function addfavorite()
	{ 
		if (Favorite::where('user_id',Auth::user()->id)->where('lesson_id',Input::get('id'))->count()<1){
			try{
				Favorite::create(array('user_id'=>Auth::user()->id,'lesson_id'=>Input::get('id')));
				return 'true';
			}catch(Exception $e){
				return 'false';
			}
		}else { return "yok"; }
	}
	
	
	public function findlesson()
	{
		$findlessons = Lesson::where('lang',Session::get('local'))->where('name','like','%'.Input::get('name').'%')->get();
		$lessons = Lesson::where('lang',Session::get('local'))->where("top_lesson",'>','0')->orderByRaw('RAND()')->limit(6)->get();
		return View::make('frontend.lesson.find',compact('findlessons','lessons'))->with('title','Aranan Ders: '.Input::get('name'))->withInput(Input::all());
	}
	
	public function saveworked()
	{	$top_lesson = Lesson::where('lang',Session::get('local'))->where('key',Input::get('id'))->top_lesson;
		if (!isset($top_lesson) or ($top_lesson==0)){ return false; }
			if (Input::has('session')){ 
				$time = time()-Session::get('start_time',Input::get('time'));			
			}else { $time = Input::get('time');  }
		$post = array(
			'lesson_id'=>Input::get('id'),
			'user_id'=>Auth::user()->id,
			'time'=>$time
		); 
			$sorgu = Worked::where('lesson_id',Input::get('id'))->where('user_id',Auth::user()->id);
			
			if ($sorgu->count()>0){
				if ( $time >= $sorgu->first()->time ){
					$sorgu2 = Worked::where('lesson_id',Input::get('id'))->where('user_id',Auth::user()->id);
					if ($sorgu2->count()>0){
						try{
							Worked::find($sorgu2->first()->id)->update($post);
							
							return "true1";
						}catch(Exception $e){
							return "false1";
						}
					}else{
						try{
						Worked::create($post);
						return "true";
						}catch(Exception $e){
							return "false";
						}
					}
				}else { return "var"; }
			}else { 
				try{
						Worked::create($post);
						return "true";
						}catch(Exception $e){
							return "false";
						}
			}
	}

	
	

}
