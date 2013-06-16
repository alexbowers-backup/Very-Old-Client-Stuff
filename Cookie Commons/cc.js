function createDiv(color) 
{ 

	link1=document.createElement('link');
	link1.href='http://cookiecommons.com/css/new/general.css';
	link1.media='screen';
	link1.rel='stylesheet';
	link1.type='text/css';
	document.getElementsByTagName('head')[0].appendChild(link1);

	link2=document.createElement('link');
	link2.href='http://cookiecommons.com/css/new/cookiecommons.' + color.toLowerCase() + '.css';
	link2.media='screen';
	link2.rel='stylesheet';
	link2.type='text/css';
	document.getElementsByTagName('head')[0].appendChild(link2);

	var _body = document.getElementsByTagName('body')[0];
	_body.innerHTML = 	'<div id="cookiecommons"><div id="cookiecommons_content" style="margin: 0 auto 20px auto;"><div id="cookiecommons_btn_container"><button class="cookiecommons_btn" onclick="cccom_accept();">Accept</button><button class="cookiecommons_btn" onclick="cccom_learnMore();">Learn More</button><button class="cookiecommons_btn" onclick="cccom_reject();">Close</button></div><h3 id="cookiecommons_title">We use cookies, what is a cookie?</h3><p id="cookiecommons_body">In order to deliver a personalised, responsive service we use Cookies. A cookie is a built-in way to store details that we need to make this website work, and remember how you use our website. Cookies are completely safe, and only accessible via Us and our trusted partners. Nobody else can view these cookies, and are under complete control by you. By clicking accept you agree to cookies being used by many websites without this warning appearing again.</p><span class="cookiecommons_span pull-right" style="position: relative; top: -5px;">Created by <a href="http://cookiecommons.com">Cookie Commons</a></span></div><div id="cookiecommons_line"></div></div></div>' + _body.innerHTML;
}


function cccom_accept() 
{
	cccom_accept2();
	document.getElementById("cookiecommons").style.display = 'none';
}

function cccom_learnMore() 
{
	window.open("http://en.wikipedia.org/wiki/Directive_on_Privacy_and_Electronic_Communications");
}

function cccom_reject() 
{
	document.getElementById("cookiecommons").style.display = 'none';
}


