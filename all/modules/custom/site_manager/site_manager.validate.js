$(document).ready(function() {
	// validate signup form on keyup and submit
	$("#forward-form").validate({
		rules: {
		 name: {  
	        	required: true, 
	        	alpha: true
	          },
         lastname: {  
		       required: true, 
		       alpha: true
		       },
		email: {
			required: true,
            email: true
        },
        femailone: {
			required: true,
            email: true
        },
        femailone: {
			required: true,
            email: true
        },
        femailone: {
			required: true,
            email: true
        },
        femailtwo: {
            email: true
        },
        femailthree: {
            email: true
        },
        femailfour: {
            email: true
        },
        femailfive: {
            email: true
        }
	   },
		messages: {
		   name: { 
			required: "Please enter firstname",
			alpha: "Please  enter only alphabets"
		 },
		lastname: { 
			required: "Please enter lastname",
			alpha: "Please  enter only alphabets"
		 },
		email: {
			required: "Please enter email address",
			email: "Invalid email address"
		},
		femailone: {
			required: "Please enter your friend email address",
			email: "Invalid email address"
		},
		femailtwo: {
			email: "Invalid email address"
		},
		femailthree: {
			email: "Invalid email address"
		},
		femailfour: {
			email: "Invalid email address"
		},
		femailfive: {
			email: "Invalid email address"
		}
		
		}
	});
	jQuery("#forward-form #edit-submit").attr("value","");
	
	$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
		},"Only Characters Allowed.");
	
	$.validator.addMethod("alphanumeric", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-z0-9A-Z\s]+$/);
		},"Only Characters Allowed.");
	
	$("#site-manager-hcp-form").validate({
		
		rules: {
		    terms: {
			required: true
	     }
	    },
		messages: {
	    	terms: "Please choose an option",
	    	profession: "Please select a valid profession"
		},
		errorPlacement: function(error, element){
			var elename = $(element).attr("name");
			var parent;
		    switch(elename) {
		     case "terms":
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
	
	$("#edit-terms-Yes").click(function(){ 
		$('#edit-profession').addClass('required');
	});
	$("#edit-terms-No").click(function(){
		$('#edit-profession').removeClass('required');
		//tb_show('Not a Healthcare Professional','/exitpop.html?height=300&width=400');
		//tb_show('CD ROM Order','body/blank.html?height=120&width=400','images/cart.jpg');
		
		tb_show('Not a Healthcare Professional','#TB_inline?height=332&width=550&inlineId=hcpexit&modal=true');
	});
	//$('#edit-terms-No').attr('alt','#TB_inline?height=300&width=400&inlineId=edit-terms-No');
	//$('#edit-terms-No').attr('alt', '#TB_inline?height=300&width=400&inlineId=edit-terms-No');
	
	$("#edit-terms-No").click(function(){
		$('#edit-profession').removeClass('required');
		
	});
	
	$.validator.addMethod("rolecheck", function(value, element) {
		if(($("#edit-role").val()) == "Choose the best description of your role"){
			return false;
		}
		else
			return true;
		});
	
	//contact us form
	// validate signup form on keyup and submit
	$("#contactus_custom_form").validate({
		rules: {
		 name: {  
	        	required: true, 
	        	alpha: true
	          },
	    surname: {  
		       required: true, 
		       alpha: true
		       },
	    role: {  
			    required: true,
			    rolecheck:true
			   },
		email: {
			required: true,
            email: true
        },
        question: {
			required: true
        }
	   },
		messages: {
		   name: { 
			required: "Please enter firstname",
			alpha: "Please  enter only alphabets"
		 },
		 surname: { 
			required: "Please enter surname",
			alpha: "Please  enter only alphabets"
		 },
		role: { 
				required: "Please select role",
				rolecheck:"Please  select valid role"
		},
		email: {
			required: "Please enter email address",
			email: "Invalid email address"
		},
		question: {
			required: "Please enter question"
		}
	  }
			
	});
	
	//request a rep form
	// validate signup form on keyup and submit
	$("#request_rep_form").validate({
		rules: {
		 name: {  
	        	required: true, 
	        	alpha: true
	          },
	    surname: {  
		       required: true, 
		       alpha: true
		       },
		email: {
			required: true,
            email: true
        },
	    address: {  
		    required: true
		   },
		postcode: {
			required: true,
			alphanumeric: true
        },
        town: {
			required: true,
		       alpha: true
        },
        telephone: {
			required: true,
			digits:true
        },
        question_message: {
			required: true
        }
	   },
		messages: {
		   name: { 
			required: "Please enter firstname",
			alpha: "Please  enter only alphabets"
		 },
		 surname: { 
			required: "Please enter surname",
			alpha: "Please  enter only alphabets"
		 },
		email: {
			required: "Please enter email address",
			email: "Invalid email address"
		},
		address: {
			required: "Please enter address"
		},
		postcode: {
			required: "Please enter postcode",
			alphanumeric: "Please  enter only alpha numeric"
		},
		town: {
			required: "Please enter town",
			alpha: "Please  enter only alphabets"
		},
		telephone: {
			required: "Please enter telephone",
			digits: "Please enter numbers only"
		},
		question_message: {
			required: "Please enter your question"
		}
		}
			
	});
	
	
	$("#site-manager-resources-form").validate({
		rules: {
		   search_term: {  
	        	required: true,
	        	minlength: 3
	            }
	     },
	     messages: {
	      search_term: { 
	   	  required: "Please a enter keyword",
	   	  minlength:"Enter minimum 3 characters"
	   	 }
	     }
	 });
$("#site-manager-language-form").validate({
		
		rules: {
		    languages: {
			required: true
	     }
	    },
		messages: {
	    	required: "Please choose an option",
		}
	});
	
	$("#site-manager-language-form-1").validate({
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