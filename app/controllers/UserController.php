<?php

class UserController extends BaseController {


	public function index()
	{	
		$classes = Classes::orderBy('id','DESC')->get();
		return View::make('frontend.users.index',compact('classes'))->with('title',Lang::get('title.user'));
	}
	
	
	
	public function register()
	{	
	
		$post = array(
			'username'=>Input::get('username'),
			'fullname'=>Input::get('fullname'),
			'email'=>Input::get('email'),
			'number'=>Input::get('number'),
			'phone'=>Input::get('phone'),
			'class_id'=>Input::get('class_id'),
			'password'=>Hash::make(Input::get('password'))
		);
		
		
		 $kural = array(
            'username' => 'required|min:3',
            'fullname' => 'required|min:5',
            'email' => 'required|email',
            'number' => 'required',
			'class_id' => 'required|NotIn:0',
			'password' => 'required|min:4',
			'password2' => 'required|same:password'
        );
		
		$mesajlar = array(
			'username.required' => Lang::get('formvali.username.required'),
			'username.min' => Lang::get('formvali.username.min'),
			'fullname.required' => Lang::get('formvali.fullname.required'),
			'fullname.min' => Lang::get('formvali.fullname.min'),
			'email.required' => Lang::get('formvali.email.required'),
			'email.email' => Lang::get('formvali.email.email'),
			'number.required' => Lang::get('formvali.number.required'),
			'class_id.required' => Lang::get('formvali.class_id.required'),
			'class_id.not_in' => Lang::get('formvali.class_id.not_in'),
			'password.required' => Lang::get('formvali.password.required'),
			'password.min' => Lang::get('formvali.password.min'),
			'password2.required' => Lang::get('formvali.password2.required'),
			'password2.same' => Lang::get('formvali.password2.same')
		);

        $validation = Validator::make(Input::all(), $kural,$mesajlar);

        if ($validation->fails()) {
            return Redirect::route('user.index')->withErrors($validation);
        }
		
		User::create($post);
		return Redirect::route('user.index')->with('success',true);
	}
	

	
	public function postLogin()
	{ 
		$field = null;
		if (filter_var(Input::get('user'), FILTER_VALIDATE_EMAIL)){ $field ="email";} 
		if (!isset($field) and is_numeric(Input::get('user'))){ $field ="number";}
		if (!isset($field)){ $field ="username";}
		
		
		$post = array(
			$field  => Input::get('user'),
			'password' => Input::get('password')
		);
		
		$remember = Input::get('remember') == true ? true : false;
		if (Auth::attempt($post,$remember)){
			return Redirect::back()->with('login_success',true);
		}else { 
			if (Input::has('post')){
				return Redirect::back()->with('success',false);
			}
			else{
				return Redirect::route('user.index')->with('success',false);
				}
		}
	
	
	}
	
	
	public function profile()
	{	
		$workeds = Worked::where('user_id',Auth::user()->id)->with('lessons')->get();
		$onworkeds = OnWorked::where('user_id',Auth::user()->id)->with('lessons')->get();
		$favorites = Favorite::where('user_id',Auth::user()->id)->with('lessons')->get();
		$notes = Notes::where('user_id',Auth::user()->id)->get();
		
		
		
		
		$messageCount = Post::where('send_id',Auth::user()->id)->orWhere(function($q){
			$q->where('send_id',0)->where(function($q){
				$q->where('class_id',0)->orWhere('class_id',Auth::user()->class_id);
			});
		})->where('reading',0)->count();
		$readingCount = ReadingPost::where('user_id',Auth::user()->id)->count();
		$messageCount = $messageCount-$readingCount;
		
		return View::make('frontend.users.profile',compact('workeds','onworkeds','favorites','notes'))->with('title',Lang::get('title.user2'))->with('messageCount',$messageCount);
	}
	
	
	public function edit()
	{	
		$id = Auth::user()->id;
		$profiles = User::find($id);
		$classes = Classes::all();
		return View::make('frontend.users.edit',compact('profiles','classes'))->with('title',Lang::get('title.user3'));	
	}
	
	public function update()
	{	
		
		$post = array(
			'username'=>Input::get('username'),
			'fullname'=>Input::get('fullname'),
			'email'=>Input::get('email'),
			'number'=>Input::get('number'),
			'phone'=>Input::get('phone'),
			'class_id'=>Input::get('class_id'),
			'password'=>Hash::make(Input::get('password'))
		);
		
		if (!Input::has('password')){ unset($post['password']); }
		
		 $kural = array(
            'username' => 'required|min:3',
            'fullname' => 'required|min:5',
            'email' => 'required|email',
            'number' => 'required',
			'class_id' => 'required|NotIn:0',
			'password'=> 'same:password2',
			'password2' => 'same:password'
        );
		
		$mesajlar = array(
			'username.required' => Lang::get('formvali.username.required'),
			'username.min' => Lang::get('formvali.username.min'),
			'fullname.required' => Lang::get('formvali.fullname.required'),
			'fullname.min' => Lang::get('formvali.fullname.min'),
			'email.required' => Lang::get('formvali.email.required'),
			'email.email' => Lang::get('formvali.email.email'),
			'number.required' => Lang::get('formvali.number.required'),
			'class_id.required' => Lang::get('formvali.class_id.required'),
			'class_id.not_in' => Lang::get('formvali.class_id.not_in'),
			'password.same' => Lang::get('formvali.password.same'),
			'password2.same' => Lang::get('formvali.password2.same')			
		);

        $validation = Validator::make(Input::all(), $kural,$mesajlar);

        if ($validation->fails()) {
            return Redirect::route('user.profile.edit')->withErrors($validation);
        }
		
		User::find(Auth::user()->id)->update($post);
		return Redirect::route('user.profile.edit')->with('success',true);
	}
	
	public function allmessage()
	{	
		$message_query = Post::where('send_id',Auth::user()->id)->orWhere(function($q){
			$q->where('send_id',0)->where(function($q){
				$q->where('class_id',0)->orWhere('class_id',Auth::user()->class_id);
			});
		})->with('users','readingpost','deletepost');
	
		
		$messages = $message_query->paginate(20);
		$messageCount = $message_query->where('reading',0)->count();
		$readingCount = ReadingPost::where('user_id',Auth::user()->id)->count();
		$messageCount = $messageCount-$readingCount;
		
		return View::make('frontend.users.postmessage',compact('messages'))->with('title',Lang::get('title.user4',array("count"=>$messageCount)));
	}
	
	public function openmessage()
	{	
		try{
			$message = Post::where('id',Input::get('id'))->first();
			return $message->toJson();
		}catch(Exception $e){
			return 'false';
		}
	}
	
	public function updatemessage()
	{ 
		try {
			if (ReadingPost::where('post_id',Input::get('id'))->where('user_id',Auth::user()->id)->count()<1){
					ReadingPost::create(array('post_id'=>Input::get('id'),'user_id'=>Auth::user()->id));	
				return 'true';
				}return 'true';
		}catch(Exception $e){
			return 'false';
		}
	
	}
	
	public function deletemessage()
	{  	$postQuery = Post::where('id',Input::get('id'))->where('send_id',Auth::user()->id);
		try {  
			if($postQuery->count()>0){
				$postQuery->delete();
				return 'true';
			}else {
				if (DeletePost::where('post_id',Input::get('id'))->where('user_id',Auth::user()->id)->count()>0){
					return 'false';
				}else {
					DeletePost::create(array('post_id'=>Input::get('id'),'user_id'=>Auth::user()->id));
					if (ReadingPost::where('post_id',Input::get('id'))->where('user_id',Auth::user()->id)->count()<1){
							ReadingPost::create(array('post_id'=>Input::get('id'),'user_id'=>Auth::user()->id));
					}
					return 'true';
				}
			}
			return 'true';
		}catch(Exception $e){
			return 'false';
		}
	
	}
	
	
	public function createmessage()
	{	
		$users = User::where('status',1)->get();
		return View::make('frontend.users.createmessage',compact('users'))->with('title',Lang::get('title.user5'));
	}
	
	public function postCreatemessage()
	{
		$post = array(
			'send_id'=>Input::get('send_id'),
			'subject'=>Input::get('subject'),
			'message'=>Input::get('message'),
			'user_id'=>Auth::user()->id,
			'class_id'=>0,
			'reading'=>0
		);
		
		
		 $kural = array(
			'send_id' => 'required|NotIn:0',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        );
		
		$mesajlar = array(
			'send_id.not_in' => Lang::get('formvali.send_id.not_in'),
			'send_id.required' => Lang::get('formvali.send_id.required'),
			'subject.required' => Lang::get('formvali.subject.required'),
			'subject.min' => Lang::get('formvali.subject.min'),
			'message.required' => Lang::get('formvali.message.required'),
			'message.min' => Lang::get('formvali.message.min'),
		);

        $validation = Validator::make(Input::all(), $kural,$mesajlar);

        if ($validation->fails()) {
            return Redirect::route('user.createmessage')->withErrors($validation);
        }
		
		Post::create($post);
		return Redirect::route('user.createmessage')->with('success',true);
		
	}
	
	
	
	public function logout()
	{
		Auth::logout();
		return Redirect::route('user.index');
	}

}
