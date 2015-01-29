<?php namespace admin;
use View,Categories,Input,Redirect,Language;
class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$veriler = Categories::orderBy('id','DESC')->where('lang',"en")->get();
		return View::make('backend.categories.index',compact('veriler'))->with('title','Kayıtlı Kategoriler');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$langs = Language::all();
		return View::make('backend.categories.create',compact('langs'))->with('title','Yeni Kategori Ekle');
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
						Categories::find($lastinsertId)->update(array("key"=>$lastinsertId));
					}
				}
			$r = Categories::create(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'lang'=>$lang->prefix,
				'key'=>$lastinsertId
			));
		}
		
		return Redirect::route('admin.categories.index');
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
		
			foreach(Categories::where('key',$id)->get() as $article){
				$veriler[$article->lang] = $article;
			}
		return View::make('backend.categories.edit',compact('veriler','langs'))->with('title','Kategori Düzenle	');
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
			Categories::where('key',$id)->where('lang',$lang->prefix)->update(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix)
			));
		}
		return Redirect::route('admin.categories.index');
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
			Categories::where('key',$id)->where('lang',$lang->prefix)->delete();		
		}
		return Redirect::route('admin.categories.index');
	}


}
