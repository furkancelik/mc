<?php namespace admin;
use View,Lesson,Categories,Contents,Input,Redirect,Language;
class LessonController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$veriler = Lesson::orderBy('id','DESC')->where('lang',"en")->with('child_lesson','parent_lesson','categories','contents')->get();
		return View::make('backend.lesson.index',compact('veriler'))->with('title','Kayıtlı Dersler');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$langs = Language::all();
		$veriler = Lesson::orderBy('id','DESC')->get();
		$categories = Categories::orderBy('id','DESC')->get();
		$contents = Contents::orderBy('id','DESC')->get();
		return View::make('backend.lesson.create',compact('veriler','categories','contents','langs'))->with('title','Yeni Ders Ekle');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		foreach(Language::all() as $k=>$lang){
			$dates[$lang->prefix] = explode(",",Input::get('date.'.$lang->prefix));

			if (count($dates[$lang->prefix])>1){ 
				foreach($dates[$lang->prefix] as $k=>$date){
					$datetype = substr($date,-2);
					if (!is_numeric($datetype)){
						if ($datetype =="sn"){ $newdates[$k] = substr($date,-strlen($date),-2); }
						if ($datetype =="dk"){ $newdates[$k] = substr($date,-strlen($date),-2)*60;}
						if ($datetype =="sa"){ $newdates[$k] = substr($date,-strlen($date),-2)*60*60;}
						$newdate[$lang->prefix] = array_sum($newdates);
					}
				}
			}else { 
					$datetype[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-2);
					if (!is_numeric($datetype[$lang->prefix])){
						if ($datetype[$lang->prefix] =="sn"){ $newdate[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-strlen(Input::get('date.'.$lang->prefix)),-2); }
						if ($datetype[$lang->prefix] =="dk"){ $newdate[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-strlen(Input::get('date.'.$lang->prefix)),-2)*60;}
						if ($datetype[$lang->prefix] =="sa"){ $newdate[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-strlen(Input::get('date.'.$lang->prefix)),-2)*60*60;}
					}else {
						$newdate[$lang->prefix] = Input::get('date.'.$lang->prefix);
					}
				
			}
		}
		
		
		foreach(Language::all() as $k=>$lang){
			if (!isset($lastinsertId)){$lastinsertId = 0;}
			else{ 
				if ($k==1){$lastinsertId = $l->id;
					Lesson::find($lastinsertId)->update(array("key"=>$lastinsertId));
				}
			}
			$l = Lesson::create(array(
				'top_lesson'=>Input::get('top_lesson.'.$lang->prefix)==0?null:Input::get('top_lesson.'.$lang->prefix),
				'name'=>Input::get('name.'.$lang->prefix),
				'categories_id'=>Input::get('categories_id.'.$lang->prefix),
				'content_id'=>Input::get('content_id.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'date'=>$newdate[$lang->prefix],
				'lang'=>$lang->prefix,
				'key'=>$lastinsertId
			));
		}
		return Redirect::route('admin.lesson.index');
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
		foreach(Lesson::where('key',$id)->get() as $lesson){
			$veriler[$lesson->lang] = $lesson;
		}
		$topLessons = Lesson::with('child_lesson','parent_lesson','categories','contents')->get();			
		$categories = Categories::select(array('id','title'))->get();
		$contents = Contents::select(array('id','title'))->get();
		return View::make('backend.lesson.edit',compact('veriler','categories','contents','topLessons','langs'))->with('title','Ders Düzenle');
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
			$dates[$lang->prefix] = explode(",",Input::get('date.'.$lang->prefix));

			if (count($dates[$lang->prefix])>1){ 
				foreach($dates[$lang->prefix] as $k=>$date){
					$datetype = substr($date,-2);
					if (!is_numeric($datetype)){
						if ($datetype =="sn"){ $newdates[$k] = substr($date,-strlen($date),-2); }
						if ($datetype =="dk"){ $newdates[$k] = substr($date,-strlen($date),-2)*60;}
						if ($datetype =="sa"){ $newdates[$k] = substr($date,-strlen($date),-2)*60*60;}
						$newdate[$lang->prefix] = array_sum($newdates);
					}
				}
			}else { 
					$datetype[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-2);
					if (!is_numeric($datetype[$lang->prefix])){
						if ($datetype[$lang->prefix] =="sn"){ $newdate[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-strlen(Input::get('date.'.$lang->prefix)),-2); }
						if ($datetype[$lang->prefix] =="dk"){ $newdate[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-strlen(Input::get('date.'.$lang->prefix)),-2)*60;}
						if ($datetype[$lang->prefix] =="sa"){ $newdate[$lang->prefix] = substr(Input::get('date.'.$lang->prefix),-strlen(Input::get('date.'.$lang->prefix)),-2)*60*60;}
					}else {
						$newdate[$lang->prefix] = Input::get('date.'.$lang->prefix);
					}
				
			}
		}
		
	
		
		foreach(Language::all() as $k=>$lang){
			$lesson = Lesson::where('key',$id)->where('lang',$lang->prefix)->update(array(
				'top_lesson'=>Input::get('top_lesson.'.$lang->prefix)==0?null:Input::get('top_lesson.'.$lang->prefix),
				'name'=>Input::get('name.'.$lang->prefix),
				'categories_id'=>Input::get('categories_id.'.$lang->prefix),
				'content_id'=>Input::get('content_id.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'date'=>$newdate[$lang->prefix]
			));
		}

		
		return Redirect::route('admin.lesson.index');
		
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
			Lesson::where('key',$id)->where('lang',$lang->prefix)->delete();		
		}
		return Redirect::route('admin.lesson.index');
	}


}
