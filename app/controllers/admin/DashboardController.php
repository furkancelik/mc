<?php
namespace admin;

use View,Auth,Redirect;
class DashboardController extends \BaseController {

	
	
	public function showWelcome()
	{	
		return View::make('backend.dashboard.index')->with('title','Yönetim Paneli');
		//return View::make('hello');
	}

}
