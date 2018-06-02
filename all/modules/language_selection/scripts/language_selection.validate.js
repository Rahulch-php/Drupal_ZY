$(document).ready(function() { 
	// validate signup form on keyup and submit

$("#language-selection-form").validate({
		
		rules: {
		    languages: {
			required: true
	     }
	    },
		messages: {
	    	required: "Please choose an option",
		}
	});
	
	$("#language-selection-form-1").validate({
	    rules: {
	       languages: {  
	          required: true,
	          }
	   },
	   messages: {
	     languages: { 
	     required: "Please a choose language",
	     }
	   },
	   errorPlacement: function(error, element){
	                var elename = $(element).attr("name");
	                var parent;
	              switch(elename) {
	               case "languages":
	                 parent = $(element).parent().parent().parent().parent();
	                  break;
	              default:
	                parent = $(element).parent().parent();
	                    break;
	              }
	              $(parent).append(error);            
	          $(element).removeClass('error');
	          }                
	});
});