<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8 />
	<meta name="description" content="<?php if (isset($page_description)) {echo $page_description;} else {echo 'Spark Lemon is an online marketplace for game developers, artists, programmers, and composers; both professional and individual.';} ?>" />
	<meta name="google-site-verification" content="lDY3aiHzJszlS_LvgzXjA0AvxHVONOJJ1McslNGPP9M" />
	<title><?php if (isset($page_title)) { echo $page_title.' - Spark Lemon'; } else { echo 'Spark Lemon - Game Development Marketplace'; } ?></title>
    <!--<style type="text/css" media="screen">@import "/css/master.php";</style>-->
    <link type="text/css" rel="stylesheet" href="<?php echo $prefs_sitebase; ?>/min/f=css/forms.css,css/general.css,js/audio/mediaelementplayer.css" />
    
    <!--<script type="text/javascript" src="<?php echo $prefs_sitebase; ?>/min/b=js&amp;f=jquery-1.4.2.min.js,audio/mediaelement-and-player.min.js"></script>-->
    <script type="text/javascript" src="<?php echo $prefs_sitebase; ?>/min/f=js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php echo $prefs_sitebase; ?>/js/audio/mediaelement-and-player.min.js"></script>
	<script type="text/javascript" src="<?php echo $prefs_sitebase; ?>/js/jeditable.js"></script>
    <link rel="stylesheer" type="text/css" href="master.css" />
    <link rel="shortcut icon" href="http://zando.co.uk/zando/sparklemon/favicon.ico">
	<!--<link rel="stylesheet" href="<?php echo $prefs_sitebase; ?>/js/audio/mediaelementplayer.css" />-->
    
    <?php
    if (isset($js_script)) { echo $js_script; }
	if (isset($more_stuff)) { echo $more_stuff; }
	
	if (/*isset($uploading)*/ 1==2) :?>
            <!-- Load Queue widget CSS and jQuery -->
            <style type="text/css">@import url(css/plupload.queue.css);</style>
            <script type="text/javascript" src="http://www.google.com/jsapi"></script>
            <script type="text/javascript">
                google.load("jquery", "1.3");
            </script>
            
            <!-- Thirdparty intialization scripts, needed for the Google Gears and BrowserPlus runtimes -->
            <script type="text/javascript" src="/plupload/js/gears_init.js"></script>
            <script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
            
            <!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
            <script type="text/javascript" src="/plupload/js/plupload.full.min.js"></script>
            <script type="text/javascript" src="/plupload/js/jquery.plupload.queue.min.js"></script>
            
            <script type="text/javascript">
            $(function() {
                $("#uploader").pluploadQueue({
                    runtimes : 'html5,gears,silverlight,flash,browserplus',
                    url : 'upload.php',
                    max_file_size : '10mb',
                    chunk_size : '1mb',
                    unique_names : true,
                    resize : {width : 320, height : 240, quality : 90},
            
                    // specify allowed file types
                    filters : [
                        {title : "Image files", extensions : "jpg,jpeg,gif,png,psd"},
						{title : "Vector files", extensions : "svg,eps"},
						{title : "Audio files", extensions : "mp3,wav"},
						{title : "Game Maker files", extensions : "gmk,gm6"},
						{title : "Extension files", extensions : "gex,ged,dll"},
						{title : "Text files", extensions : "txt"},
                        {title : "Zip files", extensions : "zip"}
                    ],
                    flash_swf_url : '/plupload/js/plupload.flash.swf',
                    silverlight_xap_url : '/plupload/js/plupload.silverlight.xap'
                });
                $('form').submit(function(e) {
                    var uploader = $('#uploader').pluploadQueue();
                    if (uploader.total.uploaded == 0) {
                        if (uploader.files.length > 0) {
                            uploader.bind('UploadProgress', function() {
                                if (uploader.total.uploaded == uploader.files.length)
                                    $('form').submit();
                            });
                            uploader.start();
                        } else
                            alert('You must at least upload one file.');
                        e.preventDefault();
                    }
                });
            });
            </script>
	<?php endif; ?>
    
    <script type="text/javascript">
		$(function(){
			$('#search_box').focus(function() { // expand
				$('#search_results').stop(true,true).slideDown('slow');
				$("#search_box").removeClass("empty");
				if ($("#search_box").val() === "search") {
					$("#search_box").val('');
				}
			});
			$('#search_box').blur(function() { // contract
				$('#search_results').stop(true,true).slideUp('slow');
				if ($("#search_box").val() === "") {
					//$("#search_results").text('');
					$("#search_box").val('search');
					$("#search_box").addClass("empty");
				}
			});
		});
	
		function loadSearch(object) {
			var query = object.value;
			if (query!="") {
				var url = "/main_search.php?search="+encodeURIComponent(query);			
				$("#search_results li").stop(true,true).animate({ opacity: 0.55 }, 200, "swing");
				$("#search_results").load(url, function(){
					$("#search_results li").css({ opacity: 0.55 });
					$("#search_results li").stop(true,true).animate({ opacity: 0.55 }, 150, "swing").animate({ opacity: 1 }, 200, "swing");
				});
				
				//$('#search_results').slideDown('slow');
			}
			else {
				$("#search_results").text('');
			}
		}
    </script>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-20685387-1']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	
	<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_area').editable('<?php echo $prefs_sitebase; ?>/process/update_bio.php', { 
			 type      : 'textarea',
			 cancel    : 'Cancel',
			 submit    : 'OK',
			 indicator : 'Saving...'
		 });
	});
	</script>

</head>
<body>
<div id="banner">
    <a href="<?php echo $prefs_sitebase; ?>" style="display: inline-block; position: absolute; margin-left: 30px; margin-top: 26px; width: 296px; height: 144px;"></a>
    <div id="header_container">
        <div id="header">
        <?php
        $display_name = "";
        if (isset($_SESSION['email']))
        {
            $email = $_SESSION['email'];
            $query=mysql_query("SELECT credits FROM accounts WHERE email='$email' LIMIT 1");
            $row = mysql_fetch_array($query);
            $credits = $row['credits'];
            
            $query = mysql_query("SELECT first_name FROM accounts WHERE email='$email' LIMIT 1");
            $row = mysql_fetch_array($query);
            $display_name = $row['first_name'];
			$is_admin = false;
            
            echo '<a class="engraved" href="'.$prefs_sitebase.'/account/credits.php" style="margin-right: 10px; background: rgba(0, 0, 0, 0.08);">credits: $'.number_format($credits,2).'</a>';
            echo '<a class="engraved" href="'.$prefs_sitebase.'">home</a><a class="engraved" href="'.$prefs_sitebase.'/account/settings.php">account</a>';
            
            if (mysql_num_rows(mysql_query("SELECT * FROM accounts WHERE email='$email' AND admin=1")) > 0) {
				$is_admin = true;
                echo '<a class="engraved" href="'.$prefs_sitebase.'/admin">admin</a>';
            }
            echo '<a class="engraved" href="'.$prefs_sitebase.'/process/logout.php">logout</a>';
        }
        else {
            echo '<a class="engraved" href="'.$prefs_sitebase.'/index.php">home</a><a class="engraved" href="'.$prefs_sitebase.'/account/login.php">login</a><a class="engraved" href="'.$prefs_sitebase.'/account/register.php">register</a>';
        }
        ?>
        </div>
    </div>
</div>

<div id="submenu">
	<div id="submenu_container">
        <div id="search_container">
            <input id="search_box" type="text" class="empty" value="search" onkeyup="loadSearch(this)" autocomplete="off" />
            <ul id="search_results"></ul>
        </div>
		<?php
		if (isset($_SESSION['email'])){			
			echo '
				<ul class="sub-list">';
			if ($is_admin) {
				$query = mysql_query("SELECT id FROM resources WHERE queued='1'");
				if (!$query) { echo "MySQL Error: ".mysql_error(); }
				$num_queued = mysql_num_rows($query);
				
				if ($num_queued > 0) {
					echo '<li><span class="notification"></span><a href="http://zando.co.uk/zando/sparklemon/admin/queued_files.php">Approve Files</a></li>';
				}
			}
			echo '	<li><a href="http://zando.co.uk/zando/sparklemon/about.php">About</a></li>
				<li><a href="http://zando.co.uk/zando/sparklemon/browse/newer">Browse Files</a></li>
					<li><a href="http://zando.co.uk/zando/sparklemon/account/downloads.php">Downloads</a></li>
				</ul>';
		}
		else
		{
			echo '
				<ul class="sub-list">
				<li><a href="http://zando.co.uk/zando/sparklemon/about.php">About</a></li>
				<li><a href="http://zando.co.uk/zando/sparklemon/browse/newer">Browse Files</a></li>
				</ul>';
		}
		?>
    </div>
</div>
<div id="container">
    <div id="main" <?php if (isset($sidebar)) { echo 'class="s"'; } if (isset($uploadBox)) { echo 'class="left-box"'; } ?>>