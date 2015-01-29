<?php

class IndexController extends BaseController {


	public function index()
	{	
		$lessons = Lesson::where('lang',Session::get('local'))->where("top_lesson",'>','0')->orderByRaw('RAND()')->limit(6)->get();
		
		$calendars = Calendar::where('lang',Session::get('local'))->orderBy('id','DESC')->get();
		
		$nowcalendars = Calendar::where('lang',Session::get('local'))->where('date','>=',date("Y-m-d 10:i:s.000000",time()))->where('date','<=',date("Y-m-d 10:i:s.000000",(time()+(60*60*24))))->orderBy('date','DESC')->get();
		$lastArticles= Article::where('lang',Session::get('local'))->orderBy('id','DESC')->limit(5)->get();
		return View::make('frontend.index.index',compact('lessons','calendars','nowcalendars','lastArticles'))->with('title',Lang::get('title.index'));
	}
	
	
	public function selectcalendar()
	{ 
		$calendar = Calendar::where('lang',Session::get('local'))->where('id',Input::get('id'))->first();
		$calendarQuery = Calendar::where('lang',Session::get('local'))->where('date',$calendar->date);
		if ($calendarQuery->count() > 0) {
			return $calendarQuery->get()->toJson();
		}else { return "false"; }	
	}
	
	public function openshowcalendar($id)
	{
		$calendar = Calendar::where('lang',Session::get('local'))->where('key',$id)->first();
		return Redirect::route('calendar.show',array($id,Helpers::seo($calendar->title)));
	}
	
	
	public function selectlanguage($lang)
	{
		Session::put("local",$lang);	
		return Redirect::back();
	}
	
	
	
	
}
