<?php namespace admin;
use View,Input,Redirect,Notes,User;
class NotesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$veriler = Notes::orderBy('id','DESC')->with('users.classes')->get();	
		return View::make('backend.notes.index',compact('veriler'))->with('title','Kayıtlı Yazılı Notları');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$users = User::select('id','fullname')->where('status','=','0')->orderBy('id','DESC')->get();
		return View::make('backend.notes.create',compact('users'))->with('title','Yeni Yazılı Notu Ekle');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = array(
			'user_id'=>Input::get('user_id'),
			'type'=>Input::get('type'),
			'note'=>Input::get('note'),
			'info'=>Input::get('info')
		);
		
		Notes::create($post);
		return Redirect::route('admin.notes.index');
		
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$veriler = Notes::find($id);
		$users = User::select('id','fullname')->where('status','=','0')->get();
		return View::make('backend.notes.edit',compact('veriler','users'))->with('title','Yazılı Notu Düzenle');
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
		$post = array(
			'user_id'=>Input::get('user_id'),
			'type'=>Input::get('type'),
			'note'=>Input::get('note'),
			'info'=>Input::get('info')
		);
		
		Notes::find($id)->update($post);
		return Redirect::route('admin.notes.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Notes::find($id)->delete();
		return Redirect::route('admin.notes.index');
	}


}
