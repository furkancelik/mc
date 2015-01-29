<?php
class Helpers {  

		public static function uMenus($category,$ust_id=null,$i=1)
		{ 
			foreach($category as $k=>$list){ 
				if ($list['top_menu']==$ust_id){
					echo  "<li "; 
					echo ($i>1)?'class="dropdown-submenu"':'class="menu-item-has-children"'; 
					$title = Article::where('lang',Session::get('local'))->select('title')->find($list['article_id']);
					
					echo "><a href=\""; echo ($list['article_id']>0)?URL::route('article.show',array($list['article_id'],$title['title'])):URL::route('404'); echo"\">".$list['name'];
					echo ($i>0)?"<b class=\"caret\"></b>":"";
					echo "</a><ul class='dropdown-menu'>";
					self::uMenus($category,$list['id'],$i+1);
					 echo "</ul>";
					echo "</li>";
				}
			}
			
		}
		
		
		public static function uLessons($category,$ust_id=null,$i=1)
		{ 	echo "<ul class=\"dropdown-menu\">";
			foreach($category as $k=>$list){ 
				if ($list['top_lesson']==$ust_id){
					echo  "<li "; 
					echo 'class="dropdown-submenu"';
					echo "><a href=\"".URL::route('lesson.show',array($list['id'],self::seo($list['name'])))."\">".$list['name'];
					echo ($i>0)?"<b class=\"caret\"></b>":"";
					echo "</a>";
					self::uLessons($category,$list['id'],$i+1);
					echo "</li>";
				}
			}
			echo "</ul>";
		}  
		
		
		public static function mLessons($top_id=null)
		{ 	 	echo "<ul>";
			$lessons = Lesson::where('lang',Session::get('local'))->where('top_lesson',$top_id)->get();
			foreach($lessons as $lesson){
				echo "<li><a href=\"".URL::route('lesson.show',array($lesson->id,self::seo($lesson->name)))."\"><i class=\"fa  fa-angle-double-right\"></i> ".$lesson->name."</a>";
					self::mLessons($lesson->id);
					echo "</li>";
			}
			
			echo "</ul>";
			
		}  
		
		
		public static function Lessons($category,$ust_id=null)
		{ 	echo "<ul>";
			foreach($category as $k=>$list){ 
				if ($list['top_lesson']==$ust_id){
					echo  "<li><a href=\"".URL::route('lesson.show',array($list['id'],self::seo($list['name'])))."\">".$list['name']."</a>";
					self::Lessons($category,$list['id']);
					echo "</li>";
				}
			}
			echo "</ul>";
		}  
		
		
		public static function lLessons($id=null){
			echo "<ul>";
			$lesson = Lesson::where('lang',Session::get('local'))->where('top_lesson',$id)->get();
			
			foreach($lesson as $l){
				echo "<li><a href=\"".URL::route('lesson.show',array($l->id,self::seo($l->name)))."\">".$l->name."</a></li>";
				self::lLessons($l->id);
			}
			echo "</ul>";
		
		}
		
		public static function seo($fonktmp) {
			$turkcefrom = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
			$turkceto   = array("G","U","S","I","O","C","g","u","s","i","o","c");
			$fonktmp = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$fonktmp);
			$fonktmp = preg_replace($turkcefrom,$turkceto,$fonktmp);
			$fonktmp = preg_replace("/ +/"," ",$fonktmp);
			$fonktmp = preg_replace("/ /","-",$fonktmp);
			$fonktmp = preg_replace("/\s/","",$fonktmp);
			$fonktmp = strtolower($fonktmp);
			$fonktmp = preg_replace("/^-/","",$fonktmp);
			$fonktmp = preg_replace("/-$/","",$fonktmp);
			$returnstr = $fonktmp;
			return $returnstr;
			}
			
		public static function lessonName($id=null,$i=0){
			$lesson =  Lesson::where('lang',Session::get('local'))->where('key',$id);
			if (isset($lesson->top_lesson)){
				self::lessonName($lesson->top_lesson,$i+1);
				echo " &gt; ";
				if ($i>0){echo "<a href=\"".URL::route('lesson.show',array($lesson->id,self::seo($lesson->name)))."\">".$lesson->name."</a>";}
				else { echo $lesson->name; }
				
			}
		}
		
		
		public static function workedLesson($id=null,$i=0){
		
		return "";
			$lesson =  Lesson::where('lang',Session::get('local'))->find($id)->get();
			if (isset($lesson->top_lesson)){
				self::workedLesson($lesson->top_lesson,$i+1);
				if ($i>0){echo "<a href=\"".URL::route('lesson.show',array($lesson->id,self::seo($lesson->name)))."\">".$lesson->name."</a>";}
				else { echo "<b><a href=\"".URL::route('lesson.show',array($lesson->id,self::seo($lesson->name)))."\">".$lesson->name."</a></b>"; }
				echo ($i>0)? " &gt; ":'';
				
				
			}
		}
		
		
		

		
}