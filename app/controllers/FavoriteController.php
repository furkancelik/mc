<?php

class FavoriteController extends BaseController {



	
	public function delete()
	{	
		$id = Input::get('id');
		try {
			Favorite::where('id',$id)->where('user_id',Auth::user()->id)->delete();
			return 'true';
		}catch(Exception $e){
			return 'false';
		}
	}

}
