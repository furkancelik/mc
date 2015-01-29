var $ = jQuery;
$(function(){
	$("li.dropdown-submenu").each(function(){
			$(this).children("a").children("b").remove();
			if($(this).children("ul").html()==""){ 
			$(this).attr("class","menu-item-has-children"); }
	});
	
	
	
	$("ul.dropdown-menu").each(function(){
		if ($(this).html()==""){ $(this).parent("li").children("a").children("b").remove();  $(this).remove(); }
		
	});
	
$('.sutun').each(function(index) {

	sol = $(this).children('.sol').height();
	sag = $(this).children('.sag').height();
	
	if (sol>sag){
		$(this).children('.sag').height(sol);
		$(this).children('.sol').after('<div style="margin:8px 5px;border-right:1px dotted #eee;weight:1px;float:left;height:'+(parseInt(sol)-parseInt(15))+'px"></div>');
	}else{
		$(this).children('.sol').height(sag);
		$(this).children('.sol').after('<div style="margin:8px 5px;border-right:1px dotted #eee;weight:1px;float:left;height:'+(parseInt(sag)-parseInt(15))+'px"></div>');
	}

});



  $('#s2_basic , .s2_basic').select2 ({
    allowClear: true,
    placeholder: "Select..."
  })
  


	
});