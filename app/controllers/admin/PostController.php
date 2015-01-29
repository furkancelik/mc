<?php namespace admin;
use View,Input,Redirect,Post,User,Auth,Classes;
class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$veriler = Post::with('users','send','classes')->orderBy('id','DESC')->get();
		return View::make('backend.posts.index',compact('veriler'))->with('title','Kayıtlı Mesajlar')->with('user_id',Auth::user()->id);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$users = User::select('id','fullname')->where('status','=','0')->orderBy('id','DESC')->get();
		$classes = Classes::select('id','name')->orderBy('id','DESC')->get();
		return View::make('backend.posts.create',compact('users','classes'))->with('title','Yeni Mesaj Gönder');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = array(
			'send_id'=>Input::get('send_id'),
			'user_id'=>Auth::user()->id,
			'subject'=>Input::get('subject'),
			'message'=>Input::get('message')
		);
		
		$durum = Post::create($post);
		return Redirect::route('admin.post.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$veriler = Post::with('users','send','classes')->where('id','=',$id)->first();
		return View::make('backend.posts.edit',compact('veriler'))->with('title','Mesaj Oku')->with('user_id',Auth::user()->id);
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

		$veri = Post::find($id);
		$veri->reading = Input::get('reading');
		$veri->save();		
		return Redirect::route('admin.post.index');
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
		return Redirect::route("admin.post.index");
	}


}
