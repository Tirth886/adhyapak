$(document).ready(function(){
	$("[data-bs-hover-animate]").mouseenter(function(){
		var a=$(this);
		a.addClass("animated "+a.attr("data-bs-hover-animate"))
	}).mouseleave(function(){
		var a=$(this);
		a.removeClass("animated "+a.attr("data-bs-hover-animate"))
	})

	$("#password-field").click(function(){
		if($("#password").attr("type" , "password")){
			$("#password").attr("type" , "text")
		}
		else{$("#password").attr("type" , "password");}
	})
});
