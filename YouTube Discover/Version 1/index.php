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
    <script src="lib/jquery.filter.js"></script>
    <script src="lib/jquery.highlight.js"></script>
    <script>
		$(document).ready(function(){
				
					$('.step_2').hide();
					$('.step_3').hide();
					$('#right').hide();
					$('.input').hide();
			
			
		});
			function showResults(){
				$('#filters').fadeOut('slow',function(){
					$('#results').fadeIn();
					
				});
				$('.step_3 p').fadeOut('slow',function(){
						$('.step_3 p').html('On the right, you\'ll find the relevant results. If they aren\'t please use the feedback tool below.');
						$('.step_3 p').fadeIn('slow');
					});
				
			}
			function showSubCategories(category){
				$.ajax({
								type: "GET",
								url: "lib/getSubCat.php?cname="+category,
								dataType: "xml",
								success: function(xml) {
									var selection = $('#sub-categories');
									$('.step_2 h2').empty();
									$('.step_2 h2').append($.cookie('step1name'));
									$(xml).find('CategoryItem').each(function(){
											var value = $(this).find('sname').text();
											var content = $(this).find('name').text();
											selection.append("<a href='filter.php?sname='"+value+"'><li name='"+value+"' class='click'>"+content+"</li></a>");
									});
									$.cookie('step1name',null);
								}
							});
			}
			function showFilters(subCat,category){
				$.ajax({
					type: "GET",
					url: "lib/getFilter.php?sname="+subCat+"&cname="+category,
					dataType: "xml",
					success: function(xml){
						var selection = $('#filterLoc');
						$(xml).find('filterItem').each(function(){
							var mainCat = $(this).find('mainCat');
							var mname = mainCat.find('mname');
							$(mainCat).each(function(){
								var subCat = $(this).find('subCat');
								selection.append('<div class="filter" name="'+mname.text()+'">');
								var selection2 = $('.filter[name="'+mname.text()+'"]');
								$(subCat).each(function(){
									
									var name = $(this).find('name').text();
									var x = $(this).find('imagex').text();
									var y = $(this).find('imagey').text();
									selection2.append('<div class="image" title="'+name+'" name="'+name+'" style="background-position: '+ x + 'px ' + y +'px;"></div>');
								});
								selection2.append('<input type="text" class="input" id="'+mname.text()+'_val" name="'+(mname.text())+'" value="" hidden="true" disabled="true" />');
								
							});
						});
					
					}
					
				});
			}
			function resetPage(){
				
				$('.step_2').hide();
				$('.step_1').hide();
				$('#sub-categories').empty();
				$('.step_3').fadeOut('slow');
				
				$('#right').fadeOut('slow',function(){
					$('.step_1').fadeIn('slow');
				});
			}
    </script>
</head>
<body>
<div id="container" style="height: 330px;">
    <header class="group">
        <a href="javascript: resetPage();" style="display: block; width: 170px;"><div id="logo">YouTube Discover</div></a>
        <nav id="nav1"><string>Login will be added soon</strong> - <a href="#" class="tooltip" title="I will be adding moderation features in the future which will allow trusted users to help speed the process of acceptance along">Submit video</a> - <a class="tooltip" title="Coming Soon">Register</a></nav>
    </header>
    <div class="group">
        <section id="left" class="step_1">
            <h2>Categories</h2>
            <ul id="categories">
            <?php
				$query = mysql_query('SELECT `name`,`cname` FROM `catlist` ORDER BY `id` ASC');
				while($row = mysql_fetch_assoc($query)){
					$array[$row['cname']] = $row['name'];
				}
							 
			foreach($array as $key => $val){
				
					echo '<a href="#"><li name="'.$key.'" temp="'.$val.'">'.$val.'</li></a>';
				
			}
			?>
            </ul>
        </section>
        <section id="left" class="step_2">
        	<h2></h2>
            <ul id="sub-categories">
            	<a href="filter.php?sname=s1"><li name="s1" temp="Name">Name</li></a>
            </ul>
        </section> 
        <section id="left" class="step_3">
        	<h2>Tutorials</h2>
            <ul id="categories">
            	<a href="javascript: resetPage();"><li>Go Back</li></a>
            </ul>
            <p>Please choose your filters on the right, or make a search query. <br /><br />Then click Go</p>
        </section> 
        <section id="right">
            <div id="filters" class="scrollable">
                <h2>Filters</h2>
                <form method="post" id="filtering" action="javascript:showResults();">
                    <input name="search" id="search" type="text" placeholder="Search Query..."/>
    
                    <div class="group" id="filterLoc">
                    <!-- uses sprites for efficiency, but *could* use individual <img>'s if absolutely necessary -->
                       
                    </div>
                    <input id="submit" type="submit" value="Go &rarr;" style="float: right;" />
                </form>
            </div>
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
        </section>
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