<?php namespace admin;
use View,Contents,Categories,Input,Redirect,Language;
class ContentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$veriler = Contents::orderBy('id','DESC')->where('lang',"en")->get();
		return View::make('backend.contents.index',compact('veriler'))->with('title','Kayıtlı İçerikler');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$langs = Language::all();
		$categories = Categories::orderBy('id','DESC')->get();
		return View::make('backend.contents.create',compact('categories','langs'))->with('title','Yeni İçerik Ekle');
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
						Contents::find($lastinsertId)->update(array("key"=>$lastinsertId));
					}
				}
			$r = Contents::create(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'content'=>Input::get('content.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'categories_id'=>Input::get('categories_id.'.$lang->prefix),
				'lang'=>$lang->prefix,
				'key'=>$lastinsertId
			));
		}
		
		return Redirect::route('admin.contents.index');
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
			foreach(Contents::where('key',$id)->get() as $article){
				$veriler[$article->lang] = $article;
			}
		$categories = Categories::orderBy('id','DESC')->get();		
		return View::make('backend.contents.edit',compact('veriler','categories','langs'))->with('title','İçerik Düzenle');
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
			Contents::where('key',$id)->where('lang',$lang->prefix)->update(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'content'=>Input::get('content.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'categories_id'=>Input::get('categories_id.'.$lang->prefix)
			));
		}
		return Redirect::route('admin.contents.index');
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
			Contents::where('key',$id)->where('lang',$lang->prefix)->delete();		
		}
		return Redirect::route('admin.contents.index');
	}


}
