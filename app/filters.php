<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/


Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});

Route::filter('auth.admin',function(){
	if (Auth::check()){ 
		$Uye = Auth::user();
		if ($Uye->status<1){ return Redirect::route('loginForm'); } 
	}else {
		return Redirect::route('loginForm');
	}

});


Route::filter('auth.user',function(){

	if (Auth::check()){
		if (in_array(Route::currentRouteName(),array('user.postLogin','user.register','user.index'))){ 
			return Redirect::route('user.profile');
		}
	}else {
		if (in_array(Route::currentRouteName(),array('user.profile','user.profile.edit','user.createmessage','user.allmessage'))){
			return Redirect::route('yetkinyok');
		}
	}

	/*if (Auth::check()){
		//if(Route::currentRouteName() == "user.index"){
			//return Redirect::route('user.profile');
		//} 
	}else {
		return "sad";Redirect::back();
	}*/

});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/


Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


Route::filter('localization',function()
{
	if (!Session::has('local'))
	{ 
		Session::put('local','en');
		App::setLocale(Session::get('local'));
	}else {
		App::setLocale(Session::get('local'));
	}

});
