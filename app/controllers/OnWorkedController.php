<?php

class OnWorkedController extends BaseController {


	
	
	
	public function delete()
	{	
		$id = Input::get('id');
		try {
			OnWorked::where('id',$id)->where('user_id',Auth::user()->id)->delete();
			return 'true';
		}catch(Exception $e){
			return 'false';
		}
	}

}
