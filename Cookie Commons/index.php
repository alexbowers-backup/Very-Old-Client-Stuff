<!doctype html>
<html>
	<head>
    	<title>Cookie Commons</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="css/prettify.css" />
        <link type="text/css" rel="stylesheet" href="css/css-buttons.css" />
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="js/prettify.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-transition.js"></script>
        <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-collapse.js"></script>
        <script type="text/javascript" src="js/ZeroClipboard.js"></script>
        <link type="text/css" rel="stylesheet" href="css/new/general.css" />
        <link type="text/css" rel="stylesheet" href="css/new/cookiecommons.gray.css" id="stylesheetColor"/>
        
        
    </head>
    <body onLoad="prettyPrint();">
    	<div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li class="active">
                                <a class="brand" href="/">CookieCommons</a>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                       		 <li><a href="http://twitter.com/cookiecommons">Contact us on Twitter @CookieCommons</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
            <hr />
            <div class="container">
            	<div class="span12">
                	<h2>What is a cookie?</h2>
                	<h4>A cookie is a text-file stored within your browser. This file can contain absolutely anything; however it often stores your progress throughout a website, such as items that you've added to a shopping cart. Or settings that you've chosen for a website, such as parental controls. </h4><br />
                </div>
                <div class="span12">
                	<h2>What we do</h2>
                    <h4>Since the UK Cookie Law was enforced, websites are required to state that they use a cookie within their websites and request permission to use them by the user. Our service allows you to do all of this using just one line of javascript. Once included, that's all you ever need to do. We take care of the rest. Plus your user only need click once for all websites ever.</h4><br />
                </div>
            	
                <div class="span12" style="padding-bottom: 5px;">
                	<h2>Your Turn!</h2>
                    <p><strong>Simply include the code on the right at any point in your html pages</strong></p>
                </div>
                <div class="span12">
                	<pre style=" height: 50px; text-indent: 15px;" class="prettyprint"><code style=" line-height: 50px;" class="language-html">&lt;script src=&quot;http://cookiecommons.com/cc.js?template=<code class="nocode"><span class="templateColor" style="color: black !important;"></span></code>&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;</code></pre><input style="margin-top: -59px; margin-right: 18px;" type="button" class="btn btn-primary pull-right" onclick='copyToClipboard();' value="Copy to Clipboard" id="btnCopy"></input>
                    
                </div>
                
                <div class="span12">
                	<div class="accordion">
                    	<div class="accordion-group">
                        	<div class="accordion-heading">
                            	<a class="accordion-toggle" data-toggle="collapse" data-target="#collapseOne" href="#collapseOne"><strong>Advanced</strong></a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse">
                                	<div style="text-align:center;">
                                    <small>Click on the colour scheme you would like</small><br /><br />
                                    	<button class="small button" onClick="showPreview('black');" data-target="#collapseTwo"><span>Black</span></button>&nbsp;
                                        <button class="small blue button" onClick="showPreview('blue');" data-target="#collapseTwo"><span>Blue</span></button>&nbsp;
                                        <button class="small green button" onClick="showPreview('green');" data-target="#collapseTwo"><span>Green</span></button>&nbsp;
                                        <button class="small purple button" onClick="showPreview('purple');" data-target="#collapseTwo"><span>Purple</span></button>&nbsp;
                                        <button class="small breen button" onClick="showPreview('breen');" data-target="#collapseTwo"><span>Breen</span></button>&nbsp;
                                        <button class="small magenta button" onClick="showPreview('magenta');" data-target="#collapseTwo"><span>Magenta</span></button>&nbsp;
                                        <button class="small red button" onClick="showPreview('red');" data-target="#collapseTwo"><span>Red</span></button>&nbsp;
                                        <button class="small orange button" onClick="showPreview('orange');" data-target="#collapseTwo"><span>Orange</span></button>&nbsp;
                                        <button class="small yellow button" onClick="showPreview('yellow');" data-target="#collapseTwo"><span>Yellow</span></button>&nbsp;
                                        <button class="small gray button" onClick="showPreview('gray');" data-target="#collapseTwo"><span>Gray</span></button>&nbsp;<br />
                                        
                                        <br />
                                	<div style="text-align:center;">
                                    
                                        <small>This is a preview of what it will look like on your website.</small><br />
                                    	<div>
											<div id="cookiecommons">
                                                 <div id="cookiecommons_content" style="margin: 0 0 20px 0;">				
                                                        <div id="cookiecommons_btn_container">
                                                        <button class="cookiecommons_btn">Accept</button> 
                                                            <button class="cookiecommons_btn">Learn More</button> 
                                                            <button class="cookiecommons_btn">Close</button>
                                                        </div>
                                                    <h3 id="cookiecommons_title">We use cookies, what is a cookie?</h3>
                                                        <p id="cookiecommons_body">In order to deliver a personalised, responsive service we use Cookies. 
                                                        A cookie is a built-in way to store details that we need to make this website 
                                                        work, and remember how you use our website. Cookies are completely safe, 
                                                        and only accessible via Us and our trusted partners. Nobody else can view these 
                                                        cookies, and are under complete control by you. By clicking accept you agree to cookies being used by many websites without this warning appearing again.</p><span class="cookiecommons_span pull-right" style="position: relative; top: -5px;">Created by <a href="http://cookiecommons.com">Cookie Commons</a></span>
                                                    </div>
						   							<div id="cookiecommons_line"></div>
												</div>                                        
                                           </div>
                                    </div>
                                </div>
                                </div>
                        </div>	
                    </div>
                </div>
            </div>
    </body>
    <script> 
	
	$(document).ready(function(){
		tmpColor = 'gray';
		showPreview(tmpColor);
	});
	function showPreview(color){
		$('#stylesheetColor').attr('href','css/new/cookiecommons.'+color+'.css');
		$('.templateColor').text(color);
		tmpColor = color;
		clip.setText( "<script src='http://cookiecommons.com/cc.js?template="+tmpColor+"' type='text/javascript'><"+"/script>" );
	}
		function copyToClipboard(){
			window.prompt("Copy to clipboard: Ctrl (cmd) + C, Enter" , "<script src='http://cookiecommons.com/cc.js?template="+tmpColor+"' type='text/javascript'><"+"/script>");
		}

		ZeroClipboard.setMoviePath( 'http://cookiecommons.com/swf/ZeroClipboard.swf' );
		var clip = new ZeroClipboard.Client();
		clip.glue( 'btnCopy' );

	</script>
    
</html>