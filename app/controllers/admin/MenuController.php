<?php namespace admin;
use View,Article,Input,Redirect,Menu,Language;
class MenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$veriler = Menu::orderBy('id','DESC')->where("lang",'en')->with('child_menu','parent_menu','articles')->get();			
		return View::make('backend.menus.index',compact('veriler'))->with('title','Kayıtlı Menüler');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$veriler = Menu::orderBy('id','DESC')->get();
		$articles = Article::orderBy('id','DESC')->get();
		$langs = Language::all();
		return View::make('backend.menus.create',compact('veriler','articles','langs'))->with('title','Yeni Menü Ekle');
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
						Menu::find($lastinsertId)->update(array("key"=>$lastinsertId));
					}
				}		
			$r = Menu::create(array(
				'top_menu'=>Input::get('top_menu.'.$lang->prefix),
				'name'=>Input::get('name.'.$lang->prefix),
				'article_id'=>Input::get('article_id.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'lang'=>$lang->prefix,
				'key'=>$lastinsertId
			));
		}
		
		return Redirect::route('admin.menu.index');
		
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
			foreach(Menu::where('key',$id)->get() as $menu){
				$veriler[$menu->lang] = $menu;
		}
			
		$topMenus = Menu::orderBy('id','DESC')->with('child_menu','parent_menu','articles')->get();			
		$articles = Article::orderBy('id','DESC')->get();
		return View::make('backend.menus.edit',compact('veriler','articles','topMenus','langs'))->with('title','Menü Düzenle');
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
			
			Menu::where('key',$id)->where('lang',$lang->prefix)->update(array(
				'top_menu'=>Input::get('top_menu.'.$lang->prefix),
				'name'=>Input::get('name.'.$lang->prefix),
				'article_id'=>Input::get('article_id.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix)
			));
		}
		

		return Redirect::route('admin.menu.index');
		
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
			Menu::where('key',$id)->where('lang',$lang->prefix)->delete();		
		}
		return Redirect::route('admin.menu.index');
	}


}
