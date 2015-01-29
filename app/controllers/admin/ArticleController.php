<?php namespace admin;
use View,Redirect,Input,Article,Language;
class ArticleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$veriler = Article::orderBy('id','DESC')->where('lang',"en")->get();
		return View::make('backend.articles.index',compact('veriler'))->with('title','Kayıtlı Makaleler');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$langs = Language::all();
		return View::make('backend.articles.create',compact('langs'))->with('title','Yeni Makale Ekle');
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
						Article::find($lastinsertId)->update(array("key"=>$lastinsertId));
					}
				}
			$r = Article::create(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'content'=>Input::get('content.'.$lang->prefix),
				'lang'=>$lang->prefix,
				'key'=>$lastinsertId
			));
		}
		
		
		return Redirect::route('admin.article.index');
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
		
			foreach(Article::where('key',$id)->get() as $article){
				$veriler[$article->lang] = $article;
			}
			
			
		return View::make('backend.articles.edit',compact('veriler','langs'))->with('title','Makale Düzenle');
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
			
			Article::where('key',$id)->where('lang',$lang->prefix)->update(array(
				'title'=>Input::get('title.'.$lang->prefix),
				'link'=>Input::get('link.'.$lang->prefix),
				'content'=>Input::get('content.'.$lang->prefix)
			));
		}
		
		return Redirect::route('admin.article.index');
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
			Article::where('key',$id)->where('lang',$lang->prefix)->delete();		
		}
		return Redirect::route('admin.article.index');
	}


}
