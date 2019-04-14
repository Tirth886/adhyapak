/* Client Side Validation 
---------------------------*/



// onload preloader 


var preload = document.getElementById('view');
function  view() {
	preload.style.display    = "none";
}

// Name Validation

function name_validate(){

	var count = 0;
	
	var a = document.getElementById('name');
	var a_reg = /^[a-zA-Z ]{3,15}$/; 
	if(a.value==""){
		// document.getElementById('name_validate').innerHTML = "name required";
		a.style.borderColor = "red";
		a.style.transition = "0.5s";
		count++;
	}
	else if(!a_reg.test(a.value)){
		a.style.borderColor = "red";
		a.style.transition = "0.5s";
		// a.value = "";
		count++;
	}
	else{
		a.style.borderColor = "green";
		a.style.transition = "0.5s";	
	}
	if(count > 0){
		return false;
	}
}

	// Email Validation 

function email_validate(){

	var count = 0;
	var b = document.getElementById('email');
	var b_reg  = /^[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail|GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)$/;
	var b_same = document.getElementById('email_validate3').innerHTML;
	// console.log(b_same);

	if(b.value==""){
		b.style.borderColor = "red";
		b.style.transition  = "0.5s";
		// document.getElementById('email_validate3').innerHTML = "";
		count++;
	}
	else if(!b_same==""){
		b.style.borderColor = "red";
	}
	else if(!b_reg.test(b.value)){
		b.style.borderColor = "red";
		b.style.transition  = "1.5";
		// b.value = "";
		// document.getElementById('email_validate3').innerHTML = "";
		count++;	
	}
	else{
		b.style.borderColor = "green";
		b.style.transition = "0.5s";	
	}
	if(count > 0){
		return false;
	}

}


	// Phone Number Validation

function phone_validate (){


	var c = document.getElementById('phone');
	var c_reg = /^[0-9]{10}$/;
	
	// if(c.value==""){
	// 	c.style.borderColor = "red";
	// 	c.style.transition = "0.5s";
	// }
	// else if(!c_reg.test(c.value)){
	// 	c.style.borderColor = "red";
	// 	c.style.transition = "0.5s";
	// 	// c.value="";
	// }
	// else{
	// 	c.style.borderColor = "green";
	// 	c.style.transition = "0.5s";	
	// }
}


	// Password Validation

function password_validate (){

	var count = 0;

	var d = document.getElementById('password');
	var d_reg = /^[a-zA-Z0-9]{6,13}$/;

	if(d.value==""){
		d.style.borderColor = "red";
		d.style.transition = "0.5s";
		count++;
	}
	else if(!d_reg.test(d.value)){
		d.style.borderColor = "red";
		d.style.transition = "0.5s";
		// d.value = "";
		count++;
	}
	else{
		d.style.borderColor = "green";
		d.style.transition = "0.5s";
	}	
	if(count > 0){
		return false;
	}
}


	// Confirm Password Validation

function cnfm_pass_validate (){

	var count = 0;
	var d = document.getElementById('password');
	var e = document.getElementById('password_repeat');
	var d_reg = /^[a-zA-Z0-9]{6,13}$/;

	if(e.value==""){
		e.style.borderColor = "red";
		document.getElementById('password_repeat_validate').innerHTML = " ";
		e.style.transition = "0.5s";
		count++;
	}
	else if(!d_reg.test(e.value)){
		e.style.borderColor = "red";
		e.style.transition = "0.5s";
	}
	else if (d.value && e.value){
		if(!d.value==""){
			if(d.value == e.value){
				e.style.borderColor = "green";
				d.style.borderColor = "green";
				document.getElementById('password_repeat_validate').innerHTML = " ";	
				e.style.transition  = "0.5s";
			}else{
				d.style.borderColor = "red";
				e.style.borderColor = "red";
				document.getElementById('password_repeat_validate').innerHTML = "password must match";
				e.style.transition = "0.5s";
				d.style.transition = "0.5s";
			}
		}else{}		
		count++;	
	}
	else{
		e.style.borderColor = "green";
		e.style.transition = "0.5s";
	}
	if(count > 0){
		return false;
	}
	
}


	// Gender Validation

function gen_validate (){

	var count = 0;

	var f = document.getElementsByName('gender');
	var g_valid = false;
	// console.log(f.length);
	var i = 0;
	while (!g_valid && i < f.length){
		if(f[i].checked){
			g_valid = true;
			count++;
		}
		i++;
	}
	if(!g_valid){
		document.getElementById('gender_validate_m').innerHTML = "*";
		document.getElementById('gender_validate_f').innerHTML = "*";
		count++;
	}else{
		document.getElementById('gender_validate_m').innerHTML = "";
		document.getElementById('gender_validate_f').innerHTML = "";
	}

	if(count > 0){
		return false;
	}
}

	// Checkbox Validation

function chk_validate () {

	var count = 0;
	var g = document.getElementById('checkbox');

	if(!g.checked){
		document.getElementById('checkbox_validate').innerHTML = "*";
		count++;
	}
	else{
		document.getElementById('checkbox_validate').innerHTML = "";
	}

	
	if(count > 0){
		return false;
	}

}

// This function call when the user click on the Button

function get_user_validate(){

	// After Clicking the Button cleaning the value's and border color from the form so that current user get the clean form
	var d = document.getElementById('password');
	var e = document.getElementById('password_repeat');
	var count = 0;
	// cleaning the passowrd value and border color
	d.style.borderColor = "";
	document.getElementById('email').style.borderColor = "";
	document.getElementById('name').style.borderColor = "";
	document.getElementById('phone').style.borderColor = "";
	// cleaning the passowrd repeat value and border color
	e.style.borderColor = "";
	// Checkbox Value Uncheked
	var g = document.getElementById('checkbox');
	g.checked = false;
	document.getElementById('checkbox_validate').innerHTML = "";
	document.getElementById('gender_validate_m').innerHTML = "";
	document.getElementById('gender_validate_f').innerHTML = "";
	document.getElementById('password_repeat_validate').innerHTML = " ";
	if(count > 0){
		return false;
	}	
}
	
	// if count greater than 0 then condition return false

	// Login page Validation

	function get_validate(){
		
		var email 		= document.getElementById('email').value;
		var r_email 	= /^[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail|GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com|COM)$/;
		var count = 0;
		if(email == ""){
			document.getElementById('email_validate').innerHTML = "email required"
			document.getElementById('email').style.borderColor = "red";
			document.getElementById('email').style.transition = "0.5s";
			count++;
		} 
		else if(!r_email.test(email)){
			document.getElementById('email_validate').innerHTML = "example : xyz@domainname.com";
			document.getElementById('email').style.borderColor = "red";;
			document.getElementById('email').style.transition = "0.5s";
			count++;
		}
		else{
			document.getElementById('email_validate').innerHTML = "";
			document.getElementById('email').style.borderColor = "";
			document.getElementById('email').style.transition = "0.5s";
		}
		var password    = document.getElementById('pass').value;
		if (password == "") {
		document.getElementById('pass_val').innerHTML     = "password required";
		document.getElementById('pass').style.borderColor = "red";
		document.getElementById('pass').style.transition  = "0.5";
		count++;
		}else{
			document.getElementById('pass_val').innerHTML = "";
			document.getElementById('pass').style.borderColor = "";
			document.getElementById('pass').style.transition  = "0.5";
		}
		if(count > 0){
			return false;
		}

	}

	function email_validate1() {
		var email 		= document.getElementById('email').value;
		var r_email 	= /^[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail|GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com|COM)$/;
		var count = 0;
		if(email == ""){
			document.getElementById('email_validate').innerHTML = "email required"
			document.getElementById('email').style.borderColor = "red";
			document.getElementById('email').style.transition = "0.5s";
			count++;
		} 
		else if(!r_email.test(email)){
			document.getElementById('email_validate').innerHTML = "example : xyz@domainname.com";
			document.getElementById('email').style.borderColor = "red";;
			document.getElementById('email').style.transition = "0.5s";
			count++;
		}
		else{
			document.getElementById('email_validate').innerHTML = "";
			document.getElementById('email').style.borderColor = "";
			document.getElementById('email').style.transition = "0.5s";
		}
		if(count > 0){
			return false;
		}
	}

	function pass_validate1(){
		var count = 0;
		var password    = document.getElementById('pass').value;
		if (password == "") {
		document.getElementById('pass_val').innerHTML     = "password required";
		document.getElementById('pass').style.borderColor = "red";
		document.getElementById('pass').style.transition  = "0.5";
		count++;
		}else{
			document.getElementById('pass_val').innerHTML = "";
			document.getElementById('pass').style.borderColor = "";
			document.getElementById('pass').style.transition  = "0.5";
		}
		if(count > 0){
			return false;
		}
	}
		// document.getElementById('email_validate4').innerHTML = "";
		// document.getElementById('phone_validate4').innerHTML = "";

function email_validate2(){
	var count = 0;
	var b = document.getElementById('email1');
	var b_reg  = /^[a-zA-Z0-9. ]+@+(gmail|yahoo|rediffmail|GMAIL|YAHOO|REDIFFMAIL|Gmail|Yahoo|Rediffmail)+\.(com)$/;
	// var b_same = document.getElementById('email_validate1').innerHTML;
	// console.log(b_same);
	var chk_emai = document.getElementById('email_validate3').innerHTML;
	console.log(chk_emai);
	// else{
	// 	b.style.borderColor = "";
	// 	b.style.transition  = "0.5";
	// }
	
	if(b.value==""){
		b.style.borderColor = "red";
		b.style.transition  = "0.5s";
		document.getElementById('email_validate4').innerHTML = "email required";
		count++;
	}
	// else if(!b_same==""){
	// 	b.style.borderColor = "red";
	// }
	else if(!b_reg.test(b.value)){
		b.style.borderColor = "red";
		b.style.transition  = "0.5";
		// b.value = "";
		// document.getElementById('email_validate3').innerHTML = "";
		count++;	
	}
	else if(chk_emai){
		b.style.borderColor = "red";
		b.style.transition  = "0.5";
	}
	else{
		document.getElementById('email_validate4').innerHTML = "email required";

		b.style.borderColor = "";
		b.style.transition = "0.5s";	
	}
	if(count > 0){
		return false;
	}else{}
}

function phone_validation (){
	var count = 0;
	var c = document.getElementById('phone');
	var c_reg = /^[0-9]{10}$/;

	var chk_phone = document.getElementById('phone_validate3').innerHTML;
	if(c.value==""){
		c.style.borderColor = "red";
		c.style.transition = "0.5s";
		document.getElementById('phone_validate4').innerHTML = "phone required";
		count++;
	}
	else if(!c_reg.test(c.value)){
		c.style.borderColor = "red";
		c.style.transition = "0.5s";
		// c.value="";
		count++;	
	}
	else if (chk_phone){
		c.style.borderColor = "red";
		c.style.transition = "0.5s";
	}

	else{
		document.getElementById('phone_validate4').innerHTML = " ";	
		c.style.borderColor = "";
		c.style.transition = "0.5s";	
	}
	if(count > 0){
		return false;
	}else{}
}

// onclick Modal Button 

// document.getElementById("change_to").style.display = "none";
function modal_fg(){

	// console.log("hello");
	// document.getElementById("change").style.display = "none";
	// document.getElementById("change_to").style.display = "block";

	document.getElementById('btn1_class').className = "fa fa-spinner fa-spin";
	var c = document.getElementById('phone');
	c.style.borderColor = "";

	document.getElementById('phone_validate4').innerHTML = "";
	document.getElementById('email_validate4').innerHTML = "";

	// email_validate2();
	// phone_validate();
	return false;
}

function close_me(){
	document.getElementById('phone_validate4').innerHTML = "";
	document.getElementById('email_validate4').innerHTML = "";
	document.getElementById('mail_success').innerHTML = "";
	document.getElementById('mail_failure').innerHTML = "";
}


// Question and Answer Function 


function quesranswer(){
	var vqs = document.getElementById('uqus').value;
	// console.log(vqs);
	var ss1,ss2;
	var s1 = document.getElementById('sme_qus1').innerHTML;
	var s2 = document.getElementById('sme_qus').innerHTML;
	// console.log(s2);
	// console.log(s1);
	ss1 = document.getElementById('question_failure').innerHTML;
	ss2 = document.getElementById('question_sucess').innerHTML;
	// console.log(s1);
	
	if(vqs!=""){
		document.getElementById('question_failure').innerHTML = "";
		document.getElementById('question_sucess').innerHTML = "";
		document.getElementById('add_requred').innerHTML = "";
	}else{}

	if(s1!="" || s2!=""){
		document.getElementById('uqus').style.borderColor = "red";
		document.getElementById('uqus').style.opacity = "0.35";
		document.getElementById('uqus').style.transition = "0.5s";
		document.getElementById('question_failure').innerHTML = "";
		document.getElementById('question_sucess').innerHTML = "";
	}else{
		document.getElementById('uqus').style.borderColor = "";
		document.getElementById('uqus').style.opacity = "";
		document.getElementById('uqus').style.transition = "";
	}
	if(ss1!="" || ss2!=""){
		document.getElementById('sme_qus1').innerHTML = "";
		document.getElementById('sme_qus').innerHTML = "";
	}else {}

}

function replybtn(){
	// console.log("hello");
	var replybox = document.getElementById('textbox').value;
	var count = 0;
	if(replybox==""){
		document.getElementById('textbox').placeholder = "required";
		document.getElementById('textbox').style.borderColor = "red";
		document.getElementById('textbox').style.transition = "0.5s";
		count++;
	}else{
		document.getElementById('textbox').placeholder = "";
		document.getElementById('textbox').style.borderColor = "";
		document.getElementById('textbox').style.transition = "";
	}
	if(count > 0){
		return false;
	}
	
}

function textbox1(){
var replybox = document.getElementById('textbox').value;
	if(replybox==""){
		document.getElementById('textbox').placeholder = "required";
		document.getElementById('textbox').style.borderColor = "red";
		document.getElementById('textbox').style.transition = "0.5s";
	}else{
		document.getElementById('textbox').placeholder = "";
		document.getElementById('textbox').style.borderColor = "";
		document.getElementById('textbox').style.transition = "";
	}
	return false;	
}

  function readURL(input) {
        if (input.files) {
            // console.log(input.files[0]);
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.imgCircle').attr('src', e.target.result).width(150).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }