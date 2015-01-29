<?php

/*
|--------------------------------------------------------------------------
| id Pattern  //Sadece Sayı 
|--------------------------------------------------------------------------
|
*/
Route::pattern('id', '[0-9]+');

	
/*
|--------------------------------------------------------------------------
| localization filitre  //Dil Desteği İçin Session Ataması
|--------------------------------------------------------------------------
|
*/
Route::group(array('before'=>'localization'),function(){

	/*
	|--------------------------------------------------------------------------
	| admin Rotaları
	|--------------------------------------------------------------------------
	|
	*/
	
	Route::get('admin','admin\AuthController@login');
	Route::get('admin/login', array('as' => 'loginForm','uses' => 'admin\AuthController@login'));
	Route::get('admin/logout', array('as' => 'logout', 'uses' => 'admin\AuthController@logout'));
	Route::post('admin/login', array('as' => 'loginFormPost', 'uses' => 'admin\AuthController@postLogin'));

	/*
	|--------------------------------------------------------------------------
	| admin İçin Rota Grubu
	|--------------------------------------------------------------------------
	|
	*/	
	Route::group(array('prefix' => 'admin', 'namespace' => 'admin', 'before' => 'auth.admin'), function () {	
		/*
		|--------------------------------------------------------------------------
		| admin Anasayfa Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		Route::get('dashboard',array('as'=>'admin.dashboard','uses'=>'DashboardController@showWelcome'));
				
		/*
		|--------------------------------------------------------------------------
		| admin Kullanıcılar Rotaları
		|--------------------------------------------------------------------------
		|
		*/

		Route::get('users',array('as'=>'admin.users','uses'=>'AuthController@index'));
		Route::get('users/show/{id}',array('as'=>'admin.users.show','uses'=>'AuthController@show'));
		Route::post('users/edit/{id}',array('as'=>'admin.users.edit','uses'=>'AuthController@edit'));
		Route::get('users/delete/{id}',array('as'=>'admin.users.delete','uses'=>'AuthController@delete'));
		
		/*
		|--------------------------------------------------------------------------
		| admin Dersler Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('lesson','LessonController');
				
		/*
		|--------------------------------------------------------------------------
		| admin Kategoriler Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('categories','CategoriesController');
		
		/*
		|--------------------------------------------------------------------------
		| admin İçerik Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('contents','ContentsController');
		
		/*
		|--------------------------------------------------------------------------
		| admin Sınıflar Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('classes','ClassesController');
		
		/*
		|--------------------------------------------------------------------------
		| admin Notlar Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('notes','NotesController');
		
		/*
		|--------------------------------------------------------------------------
		| admin Etkinlik Takvimi Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('calendar','CalendarController');
		
		
		/*
		|--------------------------------------------------------------------------
		| admin Mesajlar Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('post','PostController');
		
		/*
		|--------------------------------------------------------------------------
		| admin Çalışılan Dersler Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('worked','WorkedController');
		
		/*
		|--------------------------------------------------------------------------
		| admin Menüler Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('menu','MenuController');
		
		
		/*
		|--------------------------------------------------------------------------
		| admin Makale Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		
		Route::resource('article','ArticleController');

	});
		
		
		/*
		|--------------------------------------------------------------------------
		| Index Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		Route::get('/',array('as'=>'index','uses'=>'IndexController@index'));
		Route::get('/index','IndexController@index');
		
		/*
		|--------------------------------------------------------------------------
		| Etkinlik Seçme Rotası
		|--------------------------------------------------------------------------
		|
		*/
		Route::post('index/selectcalendar',array('as'=>'index.selectcalendar','uses'=>'IndexController@selectcalendar'));
		
		
		
		/*
		|--------------------------------------------------------------------------
		| Makale Rotaları
		|--------------------------------------------------------------------------
		|
		*/

		Route::get('article',array('as'=>'article.index','uses'=>'ArticleController@index'));
		Route::get('article-{id}/{name}',array('as'=>'article.show','uses'=>'ArticleController@show'));
		
		/*
		|--------------------------------------------------------------------------
		| Ders Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		Route::get('lesson',array('as'=>'lesson.index','uses'=>'LessonController@index'));
		Route::get('lesson-{id}/{name}',array('as'=>'lesson.show','uses'=>'LessonController@show'));
		Route::post('lesson/save/worked',array('as'=>'lesson.saveworked','uses'=>'LessonController@saveworked'));
		Route::post('lesson/addonworked',array('as'=>'lesson.addonworked','uses'=>'LessonController@addonworked'));
		Route::post('lesson/deleteonworked',array('as'=>'lesson.deleteonworked','uses'=>'LessonController@deleteonworked'));
		Route::post('lesson/addfavorite',array('as'=>'lesson.addfavorite','uses'=>'LessonController@addfavorite'));
		Route::post('lesson/deletefavorite',array('as'=>'lesson.deletefavorite','uses'=>'LessonController@deletefavorite'));
		Route::post('lesson/find',array('as'=>'lesson.find','uses'=>'LessonController@findlesson'));
		
		/*
		|--------------------------------------------------------------------------
		| Etkinlik Rotaları
		|--------------------------------------------------------------------------
		|
		*/		
		Route::get('calendar',array('as'=>'calendar.index','uses'=>'CalendarController@index'));
		Route::get('calendar-{id}/{name}',array('as'=>'calendar.show','uses'=>'CalendarController@show'));
		Route::get('openshowcalendar/{id}','IndexController@openshowcalendar');
		
		/*
		|--------------------------------------------------------------------------
		| Kullanıcı Rotaları
		|--------------------------------------------------------------------------
		|
		*/	
		Route::get('user',array('before'=>'auth.user','as'=>'user.index','uses'=>'UserController@index'));
		Route::post('user/register',array('as'=>'user.register','uses'=>'UserController@register'));
		Route::post('user/login',array('as'=>'user.postLogin','uses'=>'UserController@postLogin'));
		Route::get('user/profile',array('before'=>'auth.user','as'=>'user.profile','uses'=>'UserController@profile'));
		Route::get('user/logout',array('as'=>'user.logout','uses'=>'UserController@logout'));
		Route::get('user/profile/edit',array('before'=>'auth.user','as'=>'user.profile.edit','uses'=>'UserController@edit'));
		Route::post('user/profile/update',array('as'=>'user.profile.update','uses'=>'UserController@update'));
		Route::get('user/profile/allmessage',array('before'=>'auth.user','as'=>'user.allmessage','uses'=>'UserController@allmessage'));
		Route::get('user/profile/createmessage',array('before'=>'auth.user','as'=>'user.createmessage','uses'=>'UserController@createmessage'));
		Route::post('user/profile/openmessage',array('as'=>'user.profile.openmessage','uses'=>'UserController@openmessage'));
		Route::post('user/profile/updatemessage',array('as'=>'user.profile.updatemessage','uses'=>'UserController@updatemessage'));
		Route::post('user/profile/deletemessage',array('as'=>'user.profile.deletemessage','uses'=>'UserController@deletemessage'));
		Route::post('user/message/create',array('as'=>'user.message.create','uses'=>'UserController@postCreatemessage'));
		
		
		
		/*
		|--------------------------------------------------------------------------
		| Çalışılan Dersler Favoriler Rotaları
		|--------------------------------------------------------------------------
		|
		*/	
		Route::post('onworked/delete',array('as'=>'onworked.delete','uses'=>'OnWorkedController@delete'));
		Route::post('favorite/delete',array('as'=>'favorite.delete','uses'=>'FavoriteController@delete'));

		/*
		|--------------------------------------------------------------------------
		| Dil Seçme Rotası
		|--------------------------------------------------------------------------
		|
		*/	
		Route::get('/language/{lang}',array('as'=>'language','uses'=>'IndexController@selectlanguage'));

		/*
		|--------------------------------------------------------------------------
		| 404 , Hata ve Yetki Rotaları
		|--------------------------------------------------------------------------
		|
		*/
		/*Route::get('404',array('as'=>'404','uses'=>function(){ return "404"; }));
		Route::get('notauthorized',array('as'=>'yetkinyok',function(){
			return View::make('frontend.errors.notauther');
		}));
		
		App::error(function (Exception $exception) {
			 $error = $exception->getMessage();
			return Response::view('frontend.errors.error', compact('error'));
		});

		App::missing(function () {
			return Response::view('frontend.errors.404', array(), 404);
		});
		*/

	
});
	
