<?php

class CalendarController extends BaseController {


	public function index()
	{
		$veriler = Calendar::where('lang',Session::get('local'))->where('date','>=',date("Y-m-d 10:i:s.000000",time()))->orderBy('date','ASC')->paginate(20);
		return View::make('frontend.calendar.index',compact('veriler'))->with('title',Lang::get('title.calendars'));
	}
	
	
	public function show($id,$name)
	{
	
		$veri = Calendar::find($id);
		$calendars = Calendar::where('lang',Session::get('local'))->where('date','>=',date("Y-m-d 10:i:s.000000",time()))->orderBy('date','ASC')->limit(6)->get();
		return View::make('frontend.calendar.show',compact('veri','calendars'))->with('title',$veri->title);
	}

}
