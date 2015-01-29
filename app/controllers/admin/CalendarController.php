<?php namespace admin;
use View,Input,Redirect,Calendar,Language;
class CalendarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$veriler = Calendar::orderBy('id','DESC')->where('lang',"en")->get();
		return View::make('backend.calendar.index',compact('veriler'))->with('title','Kayıtlı Etkinlikler');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$langs = Language::all();
		return View::make('backend.calendar.create',compact('langs'))->with('title','Yeni Etkinlik Ekle');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		foreach(Language::all() as $k=>$lang){
			if (!isset($lastinsertId)){$lastinsertId = 0;}
				else{ 
					if ($k==1){$lastinsertId = $r->id;
						Calendar::find($lastinsertId)->update(array("key"=>$lastinsertId));
					}
				}
			$r = Calendar::create(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'date'=>Input::get('date.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'description'=>Input::get('description.'.$lang->prefix),
				'lang'=>$lang->prefix,
				'key'=>$lastinsertId
			));
		}
	
		return Redirect::route('admin.calendar.index');
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$langs = Language::all();
		
			foreach(Calendar::where('key',$id)->get() as $calendar){
				$veriler[$calendar->lang] = $calendar;
			}
		return View::make('backend.calendar.edit',compact('veriler','langs'))->with('title','Etkinlik Düzenle');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{		
		foreach(Language::all() as $k=>$lang){
			
			Calendar::where('key',$id)->where('lang',$lang->prefix)->update(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'date'=>Input::get('date.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'description'=>Input::get('description.'.$lang->prefix)
			));
		}
		return Redirect::route('admin.calendar.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		foreach(Language::all() as $k=>$lang){	
			Calendar::where('key',$id)->where('lang',$lang->prefix)->delete();		
		}
		return Redirect::route('admin.calendar.index');
	}


}
