<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
@include('frontend.layout.head')
</head>
<body class="page page-id-2178 page-template page-template-tpl-page-builder-php wpb-js-composer js-comp-ver-4.3.2 vc_responsive">
	<div id="header">
		@include('frontend.layout.header')
	</div><!-- /#header -->
	
	<div id="navigation-wrapper">
		@include('frontend.layout.navigasyon')
	</div><!-- /#navigation-wrapper -->
	
	<div class="container">
		<div class="vc_row wpb_row vc_row-fluid">
			<div class="vc_col-sm-12 wpb_column vc_column_container">
				<div class="wpb_wrapper">
					<div class="vc_row wpb_row vc_inner vc_row-fluid">
						<div class="vc_col-sm-8 wpb_column vc_column_container vc_custom_1405954490755">
						
						@yield('mainContent')
						</div> 

						<div class="vc_col-sm-4 sidebar wpb_column vc_column_container">
							@yield('rightContent')
						</div> 
					</div>
				</div> 
			</div> 
		</div>
	</div>
	
	<div id="footer">
		@include('frontend.layout.footer')
	</div><!-- /#footer -->
    


{{ HTML::script('assets/frontend/js/comment-reply.min2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/ie8/jquery.placeholder2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/functions2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/custom2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/jquery.cookie2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/bootstrap-multiselect2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/jquery.form.min2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/ajax_handled2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/themes/videotube/assets/js/loading-more2e46.js?ver=3.9.2') }}	
{{ HTML::script('assets/frontend/plugins/js_composer/assets/js/js_composer_front274c.js?ver=4.3.2') }}	
{{ HTML::script('assets/frontend/js/datepicker/bootstrap-datepicker.js') }}	
{{ HTML::script('assets/frontend/js/enscroll-0.6.0.min.js') }}	

<script type="text/javascript">
	var $ = jQuery;
	$(function(){
	
	@yield('jqCode')
	
	
	$('.calendarinfo').enscroll({
    showOnHover: false,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});
	
	
	$("body").on('click','.onworkedDel',function(){ 
		var id = $(this).attr("id");
		var ths = $(this);
			var formdata = {
								'id':id
							};
			
			$.ajax({
						method : "POST",
						url : "{{ URL::route('onworked.delete') }}",
						data: formdata,
						dataTypr:'json',
						success:function(cevap){  
							if (cevap=="true"){
							ths.parents("li").remove();
							}else { alert("{{ Lang::get('layout/layout.notdelete') }}"); }
						}  
					});
			return false;
		  });
		  
		  
		  
	$("body").on('click','.favoriteDel',function(){ 
		var id = $(this).attr("id");
		var ths = $(this);
			var formdata = {
								'id':id
							};
			
			$.ajax({
						method : "POST",
						url : "{{ URL::route('favorite.delete') }}",
						data: formdata,
						dataTypr:'json',
						success:function(cevap){   
							if (cevap=="true"){
							ths.parents("li").remove();
							}else { alert("{{ Lang::get('layout/layout.notdelete') }}"); }
						}  
					});
			return false;
		  });
		  
	$('[data-target="#openmessage"]').click(function(){ 
		var id = $(this).attr("id");
		
			var formdata = {
								'id':id
							};
			
			$.ajax({
						method : "POST",
						url : "{{ URL::route('user.profile.openmessage') }}",
						data: formdata,
						dataTypr:'json',
						success:function(cevap){
							if (cevap!='false'){
							cevap = $.parseJSON(cevap);
							$("#openmessage div.modal-body").html("<b>{{ Lang::get('layout/layout.konu') }}:</b><br />"+cevap.subject+'<br /><br /><b>{{ Lang::get("layout/layout.icerik") }}:</b><br />'+cevap.message);
							$("#openmessage").modal(open);
								$.ajax({
									method:'POST',url:"{{URL::route('user.profile.updatemessage')  }}",data:'id='+id
								});
							}else {  
								$("#openmessage h4.modal-title").html('{{ Lang::get("layout/layout.beklenmedikhata") }}');
								$("#openmessage div.modal-body").html("<p>{{ Lang::get('layout/layout.messageerror') }}</p>");
								$("#openmessage").modal(open);
							}
						}  
					});
			return false;
	});		  
		  
		  
		  
		  
	$('body').on('click','.messageDel',function(){ 
		var id = $(this).attr("id");
		var ths = $(this).parents('tr');
		$.ajax({
				method:'POST',url:"{{URL::route('user.profile.deletemessage')  }}",data:'id='+id,success:function(cevap){
					if (cevap=='true'){ ths.remove(); }
					else { alert('{{ Lang::get("layout/layout.messageerror2") }}'); }
				}
				});
			return false;
	});		
	
	
	$("body").on('click','.addonworked',function(){
		var id = $(this).attr("id");
		var ths = $(this);
		$.ajax({
				method:'POST',url:"{{URL::route('lesson.addonworked')  }}",data:'id='+id,success:function(e){ 
					if(e=='true' ){
								$(ths).children("i").addClass('active');
								$(ths).attr("class","deleteonworked");
								$(ths).children('span').html("{{ Lang::get('layout/layout.deleteonwork') }}");
						} else {
							alert('{{ Lang::get("layout/layout.notadd") }}');
						}
					}
			});
		return false;
	});
	
	$("body").on('click','.deleteonworked',function(){
		var id = $(this).attr("id");
		var ths = $(this);
		$.ajax({
				method:'POST',url:"{{URL::route('lesson.deleteonworked')  }}",data:'id='+id,success:function(e){ 
					if(e=='true' ){
								$(ths).children("i").removeClass('active');
								$(ths).attr("class","addonworked");
								$(ths).children('span').html("{{ Lang::get('layout/layout.addonwork') }}");
						} else {
							alert('{{ Lang::get("layout/layout.notremove") }}');
						}
					}
			});
		return false;
	});
	
	
	
	
	
	$("body").on('click','.addfavorite',function(){ 
		var id = $(this).attr("id");
		var ths = $(this);
		$.ajax({
				method:'POST',url:"{{URL::route('lesson.addfavorite')  }}",data:'id='+id,success:function(e){ 
					if(e=='true' ){ 
								$(ths).children("i").addClass('active');
								$(ths).attr("class","deletefavorite");
								$(ths).children('span').html("{{ Lang::get('layout/layout.removefavorite') }}");
						} else {
							alert('{{ Lang::get("layout/layout.notadd") }}');
						}
					}
			});
		return false;
	});
	
	$("body").on('click','.deletefavorite',function(){
		var id = $(this).attr("id");
		var ths = $(this);
		$.ajax({
				method:'POST',url:"{{URL::route('lesson.deletefavorite')  }}",data:'id='+id,success:function(e){ 
					if(e=='true' ){ 
								$(ths).children("i").removeClass('active');
								$(ths).attr("class","addfavorite");
								$(ths).children('span').html("{{ Lang::get('layout/layout.addfavorite') }}");
						} else {
							alert('{{ Lang::get("layout/layout.notremove") }}');
						}
					}
			});
		return false;
	});
	
	$(".openlesson").click(function(){
		var classs =  $(this).children("i").attr("class").split(" ");
		$(".openlesson").each(function(){
			$(this).children("i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
		});
		if (classs[1] == "fa-chevron-down"){ $(this).children("i").removeClass("fa-chevron-down").addClass("fa-chevron-right"); }
		if (classs[1] == "fa-chevron-right"){ $(this).children("i").removeClass("fa-chevron-right").addClass("fa-chevron-down");}
	});
		  
 });
</script>

</body>
</html>
