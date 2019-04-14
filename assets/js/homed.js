$(document).ready(function(){
	$('#sidebarCollapse').on('click',function(){
		$('#sidebar').toggleClass('active');
	});

	$("a#reply").one("click",function(){
		var qusCode = $(this).attr("name");
		console.log(qusCode);
		$(this).parent().append("<form method = 'post'><textarea placeholder = 'Answer . . .'class='form-text' name='answer' id = 'textbox' onkeyup='textbox1();'></textarea><input type='hidden' name='code' value='"+qusCode+"'><input type='submit' class='btn btn-primary' name='new_answer' value='Reply' onclick='return replybtn();'></form>");
			// Input Type Hidden is when user click on the Answer it will store the unique code of that question 
	});
});