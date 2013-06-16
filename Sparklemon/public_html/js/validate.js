/*
validate.js
Used to validate forms
*/

//Variables
var form=$("#validate_form");
var email=$("#email");
var email_i=$("#email_i");

var opass=$("#opassword");
var opass_i=$("#opassword_i");

var pass=$("#password");
var pass_i=$("#password_i");
var pass2=$("#password2");
var pass_i2=$("#password2_i");


opass.keyup(function() {
	opass.removeClass("val_i");
	opass_i.text("");
	opass_i.removeClass("val");
    delay(function() {
      validateOPassword();
    },500);
});


email.keyup(function() {
	email.removeClass("val_i");
	email_i.text("");
	email_i.removeClass("val");
    delay(function() {
      validateEmail();
    },500);
});
pass.keyup(function() {
	pass.removeClass("val_i");
	pass_i.text("");
	pass_i.removeClass("val");
	pass2.removeClass("val_i");
	pass_i2.text("");
	pass_i2.removeClass("val");
    delay(function() {
      validatePassword();
    },500);
});
pass2.keyup(function() {
	pass2.removeClass("val_i");
	pass_i2.text("");
	pass_i2.removeClass("val");
    delay(function() {
      validatePassword2();
    },500);
});

//Delay
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

//Validate Email
function validateEmail() {
	var x=$("#email").val();
	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

	if(filter.test(x)) {
		email.removeClass("val_i");
		email_i.text("");
		email_i.removeClass("val");
		return true;
	}
	else {
		email.addClass("val_i");
		email_i.text("Please enter a valid email");
		email_i.addClass("val");
		return false;
	}
}

//Validate Original Password
function validateOPassword() {
	if(opass.val().length>=6 || opass.val().length==0) {
		opass.removeClass("val_i");
		opass_i.text("");
		opass_i.removeClass("val");
		return true;
	}
	else {
		opass.addClass("val_i");
		opass_i.text("Password must be at least 6 characters");
		opass_i.addClass("val");
		return false;
	}
}

//Validate Password
function validatePassword() {
	if (pass.val().length>=6 || pass.val().length==0) {
		pass.removeClass("val_i");
		pass_i.text("");
		pass_i.removeClass("val");
		return true;
	}
	else {
		pass.addClass("val_i");
		pass_i.text("Password must be at least 6 characters");
		pass_i.addClass("val");
		return false;
	}
}

//Validate Password2
function validatePassword2() {
	if (pass.val()==pass2.val()) {
		pass2.removeClass("val_i");
		pass_i2.text("");
		pass_i2.removeClass("val");
		return true;
	}
	else {
		pass2.addClass("val_i");
		pass_i2.text("Passwords must match");
		pass_i2.addClass("val");
		return false;
	}
}