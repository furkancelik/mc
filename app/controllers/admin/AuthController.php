<?php
namespace admin;

use BaseController,View,Input,Auth,Redirect,User,Hash,Classes;

class AuthController extends BaseController {


	public function login()
	{
		if (Auth::check()){
			if (Auth::user()->status>0)
			return Redirect::route('admin.dashboard');
			else return View::make('backend.login.index');
		}else {
			return View::make('backend.login.index');
		}
	}

	
	public function postLogin()
	{
	
		$post = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'status' => 1
		);
		$remember = Input::get('remember') == true ? true : false;
		if (Auth::attempt($post,$remember)){
			return Redirect::to('admin/dashboard');
		}else {
			return Redirect::route('loginForm')->withErrors(array('Girdiğiniz kullanıcı bilgileri geçerli değil'));
		}
	
	
	}
	
	public function logout()
	{
		Auth::logout();
		return Redirect::route('index');
	}
	
	
	public function index()
	{
		$veriler = User::where('status','=','0')->with('classes')->orderBy('id','DESC')->get();
		return View::make('backend.users.index',compact('veriler'))->with('title','Kayıtlı Kullanıcılar');
	}
	
	
	public function show($id)
	{
		$veriler = User::find($id);
		$classes = Classes::orderBy('id','DESC')->get();
		return View::make('backend.users.edit',compact('veriler','classes'))->with('title','Kullanıcı Düzenle');
		
	}
	
	public function edit($id)
	{
	
		$post = array(
			'username'=>Input::get('username'),
			'fullname'=>Input::get('fullname'),
			'email'=>Input::get('email'),
			'number'=>Input::get('number'),
			'class_id'=>Input::get('class_id')
			
		);
		Input::has('password')>0?$post['password']=Hash::make(Input::get('password')):'';

		$sonuc = User::find($id)->update($post);
		return Redirect::route('admin.users');
				
	
	}
	
	public function delete($id)
	{
		User::find($id)->delete();
		return Redirect::route('admin.users');
		
	}
	
}
