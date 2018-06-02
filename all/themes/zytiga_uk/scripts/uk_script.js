$(document).ready(function() {
  if($('#navigation').length) {
	 var str= document.location.href;
	 if(str.search(/googlesearch_custom?/) != '-1' ) {
		 $('#navigation ul.menu li.last a').each(function() {
			 var last_li = $(this).html();
			 if(last_li == 'Resources') {
				 $(this).addClass('active');
				 $(this).parent().addClass('active-trail'); 
			 }
		 });
	 }
  }
	
  if($('#site-map .site-map-message').length) {
	$('#site-map .site-map-message').html('<h1>Sitemap</h1><hr>');
  }
  
  if($('#edit-question-message-wrapper .resizable-textarea').length) {
	$('#edit-question-message-wrapper .resizable-textarea .grippie').attr('style', '');
  }
  
  //right side container
  if ($("#rightnav_container").length ) {
    $("#rightnav_container .menu li:nth-child(1),#rightnav_container .menu li:nth-child(2)").addClass('video');
    $("#rightnav_container .menu li:nth-child(3),#rightnav_container .menu li:nth-child(4)").addClass('docs');
  }
	
  fontsize_normal = parseInt($("body").css("font-size"));
  default_size = "n";
  

  if($.cookie('uk_fontsize') == null)
	    fontsize_normal = 12;
  
  if (fontsize_normal > 17) {
    fontsize_normal = 12;
  }

  fontsize_smaller = fontsize_normal - 2;
  fontsize_bigger = fontsize_normal + 2;
  
    
  
  $("#txtsmall").click(function() {
    $("body").css("font-size", fontsize_smaller + "px");
    $.cookie("uk_fontsize", fontsize_smaller, { path: '/' });
    $.cookie("uk_selected_size", "s", { path: '/' });
    set_font_size();
  });

  $("#txtnormal").click(function() {
    $("body").css("font-size", fontsize_normal + "px");
    $.cookie("uk_fontsize", fontsize_normal, { path: '/' });
    $.cookie("uk_selected_size", "n", { path: '/' });
    set_font_size();
  });

  $("#txtbig").click(function() {
    $("body").css("font-size", fontsize_bigger + "px");
    $.cookie("uk_fontsize", fontsize_bigger, { path: '/' });
    $.cookie("uk_selected_size", "b", { path: '/' });
    set_font_size();
  });
  
  set_font_size();
  
});

function set_font_size() {
	if ($.cookie("uk_fontsize")) {
	  fontsize = $.cookie("uk_fontsize");
	} else {
	  fontsize = fontsize_normal;
	}
	
	if ($.cookie("uk_selected_size")) {
	  selected_size = $.cookie("uk_selected_size");
	} else {
	  selected_size = default_size;
	}
    if($('#txtsmall').length)
    	document.getElementById("txtsmall").className = "small";

    if($('#txtnormal').length)
    document.getElementById("txtnormal").className = "medium";

    if($('#txtbig').length)
    document.getElementById("txtbig").className = "large";
    	
    if(selected_size == 's' && $('#txtsmall').length)
    	document.getElementById("txtsmall").className = "small_slctd"
    else if(selected_size == 'n' && $('#txtnormal').length) 
    	document.getElementById("txtnormal").className = "medium_slctd"
    else {
    	if($('#txtbig').length)
    		document.getElementById("txtbig").className = "large_slctd"
    }
    
	$("body").css("font-size", fontsize + "px");
}
function topNav_off(param1,param2){
			document.getElementById(param1).style.display = '';
			document.getElementById(param2).style.display = 'none';	
}

function topNav_on(param1,param2){
			document.getElementById(param1).style.display = '';
			document.getElementById(param2).style.display = 'none';	
}

/* Script for font enlargement ends here */