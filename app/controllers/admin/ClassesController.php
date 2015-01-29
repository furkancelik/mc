<?php namespace admin;
use View,Classes,Input,Redirect;
class ClassesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$veriler = Classes::orderBy('id','DESC')->get();
		return View::make('backend.classes.index',compact('veriler'))->with('title','Kayıtlı Sınıflar');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.classes.create')->with('title','Yeni Sınıf Ekle');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = array(
			'name'=>Input::get('name')
		);
		
		Classes::create($post);
		return Redirect::route('admin.classes.index');
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$veriler = Classes::find($id);
		return View::make('backend.classes.edit',compact('veriler'))->with('title','Sınıf Düzenle');
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
			'name'=>Input::get('name')
		);
		
		Classes::find($id)->update($post);
		return Redirect::route('admin.classes.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Classes::find($id)->delete();
		return Redirect::route('admin.classes.index');
	}


}
