<?php
	require('config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>YouTube Discover | Beta</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="lib/tipTip.css">
    <style>
	@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url('lib/fonts/cJZKeOuBrn4kERxqtaUH3bO3LdcAZYWl9Si6vvxL-qU.woff') format('woff');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  src: local('Open Sans Semibold'), local('OpenSans-Semibold'), url('lib/fonts/MTP_ySUJH_bn48VBG8sNSqRDOzjiPcYnFooOUGCOsRk.woff') format('woff');
}
	</style>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="lib/jquery.cookie.js"></script>
    <script src="lib/jquery.highlight.js"></script>
    
</head>
<body>
<div id="container" style="height: 330px;">
    <header class="group">
        <a href="javascript: resetPage();" style="display: block; width: 170px;"><div id="logo">YouTube Discover</div></a>
        <nav id="nav1"><string>Login will be added soon</strong> - <a href="#" class="tooltip" title="I will be adding moderation features in the future which will allow trusted users to help speed the process of acceptance along">Submit video</a> - <a class="tooltip" title="Coming Soon">Register</a></nav>
    </header>
    <div class="group">
            <div id="results">
                <div class="scrollable group">
                    <a href="play_video.html" title="Result 1"></a>
                    <a href="play_video.html" title="Result 2 which is a really cool result"></a>
                    <a href="play_video.html" title="Result 3"></a>
                    <a href="play_video.html" title="Result 4"></a>
                    <a href="play_video.html" title="Result 5"></a>

                    <a href="play_video.html" title="Result 1"></a>
                    <a href="play_video.html" title="Result 2 which is a really cool result"></a>
                    <a href="play_video.html" title="Result 3"></a>
                    <a href="play_video.html" title="Result 4"></a>
                    <a href="play_video.html" title="Result 5"></a>

                    <a href="play_video.html" title="Result 1"></a>
                    <a href="play_video.html" title="Result 2 which is a really cool result"></a>
                    <a href="play_video.html" title="Result 3"></a>
                    <a href="play_video.html" title="Result 4"></a>
                    <a href="play_video.html" title="Result 5"></a>

                    <a href="play_video.html" title="Result 1"></a>
                    <a href="play_video.html" title="Result 2 which is a really cool result"></a>
                    <a href="play_video.html" title="Result 3"></a>
                    <a href="play_video.html" title="Result 4"></a>
                    <a href="play_video.html" title="Result 5"></a>

                    <a href="play_video.html" title="Result 1"></a>
                    <a href="play_video.html" title="Result 2 which is a really cool result"></a>
                    <a href="play_video.html" title="Result 3"></a>
                    <a href="play_video.html" title="Result 4"></a>
                    <a href="play_video.html" title="Result 5"></a>

                    <a href="play_video.html" title="Result 1"></a>
                    <a href="play_video.html" title="Result 2 which is a really cool result"></a>
                    <a href="play_video.html" title="Result 3"></a>
                    <a href="play_video.html" title="Result 4"></a>
                    <a href="play_video.html" title="Result 5"></a>

                    <a href="play_video.html" title="Result 1"></a>
                    <a href="play_video.html" title="Result 2 which is a really cool result"></a>
                    <a href="play_video.html" title="Result 3"></a>
                    <a href="play_video.html" title="Result 4"></a>
                    <a href="play_video.html" title="Result 5"></a>
                </div>
            </div>
    </div>
</div>
<footer>
    <span class="padded tooltip" title="Videos are copyright of their respective owners. My copyright is only to those videos that are of my creation, and to the code upon this website was created. Some code is from open source projects.">&copy; Copyright 2011 Alex Bowers</span>
    <span class="padded"><a href="http://gplus.to/bowersbros" class="tooltip" title="No anonymous submissions allowed incase I need to get more details. But private or public submissions allowed. For private, on my profle click on either Send Message or Send Email">Provide Feedback</a></span>
    <span class="padded tooltip" title="I am in no way afflicated with Google Inc, YouTube and do not own any, or store any of the video content on my server. I am just a portal to discover YouTube Videos.">Read Me</span>
    <span class="padded tooltip" title="I store details about your visit. I do not provide or sell this information to anybody else. Nor will I ever use this information for profit. The information stored is anonymous, but unique to you. To understand more about this, send me a message on Google Plus via the Feedback link.">Privacy</span>
</footer>

<script src="lib/jquery.tipTip.minified.js"></script>
<script>
    $(function() {
        // makes HTML more semantic
        var val = $('#categories').attr('value');
        $('#categories').find('[name="' + val + '"]').eq(0).addClass('active'); // activate first category

        $(window).resize(); // set divs to the correct sizes
        $('.filter').attr('title', function() { // set filter titles to match their selections
            return $(this).children().first().attr('name');
        });
		function tooltip_activate(input){
			$(input).tipTip();	
		}
        $(".tooltip").tipTip();
    });

    $(window).resize(function(){
        $('section#left, .scrollable').css('height', window.innerHeight - 221); // just a simple resize thing
        $('.scrollable.group').css('height', window.innerHeight - 251);
    });
</script>
<script src="lib/jquery.navigation.js"></script>
</body>
</html>