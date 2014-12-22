       $(function() {
	   var chk;
       $('.dropdown').hover(function() { 
	  	 cls = $(this).attr("class");
	  	 ncls = cls.split(' ')[1];
		 chk = ncls;
		 $("#Details .subnav").removeClass("show");
		 $("#Details .subnav").css({display:'none'});
	  	 $("#Details ,#Details"+" ."+ncls).show().addClass("show");
       	

	   	 //$(".home, #Details").addClass("active");
	   //$('#Details').show().addClass( "show" );
       });
	   
	    $("#Details .home").hover(function(){
     	    $(".nav li.home").addClass("active");
        });
		
		  $("#Details").mouseleave(function(){
     	    $(".nav li.home").removeClass("active");
            $(".nav li.home").removeClass("open");

        });
		
		 
	    $("#Details .developer").hover(function(){
     	    $(".nav li.developer").addClass("active");

        });
		
		  $("#Details").mouseleave(function(){
     	    $(".nav li.developer").removeClass("active");
            $(".nav li.developer").removeClass("open");
        });
		
		
		
		  $("#Details .projects").hover(function(){
     	  $(".nav li.projects").addClass("active");

        });
		
		
	/* for banner  		
		  $("#Details ").hover(function(){
     	  $(".banner").addClass("top_spc");

        });
		
		  $("#Details ").mouseleave(function(){
     	  $(".banner").removeClass("top_spc");

        });
		
			
		  $(".home,  .projects, .developer").hover(function(){
     	  $(".banner").addClass("top_spc");

        });
		
		  $(".home,  .projects, .developer").mouseleave(function(){
     	  $(".banner").removeClass("top_spc");

        });
		
			/* for banner  */		

		
		  $("#Details").mouseleave(function(){
     	    $(".nav li.projects").removeClass("active");
            $(".nav li.projects").removeClass("open");
        });
		
		
		
		 $(".nav li.home").hover(function(){
            $("#Details .home .row").addClass("caret_icon");
        });


        $(".nav li.developer").hover(function(){
            $("#Details .developer .row").addClass("caret_icon2");
        });


       $(".nav li.projects").hover(function(){
            $("#Details .projects .row").addClass("caret_icon3");
        });

		

	    $("#Details").mouseleave(function(){
		  $("#Details").removeClass("show");
	   });
	   
	    $(".dropnone").hover(function(){
		  $("#Details").removeClass("show");
         $(".nav li.home").removeClass("open");
	   });
	   
	   
	   
	 /* function() { 
       $('#Details').hide().removeClass( "show" ); 
       });*/
	   
     });	 
