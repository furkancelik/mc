<?php

class ArticleController extends BaseController {


	public function index()
	{
		$veriler = Article::where('lang',Session::get('local'))->orderBy('id','DESC')->paginate(10);
		return View::make('frontend.article.index',compact('veriler'))->with('title',Lang::get('title.article'));
	}
	
	
	public function show($id,$name)
	{
	
		$veri = Article::find($id);
		$lastArticles = Article::where('lang',Session::get('local'))->orderBy('id','DESC')->limit(5)->get();
		return View::make('frontend.article.show',compact('veri','lastArticles'))->with('title',$veri->title);
	}

}
