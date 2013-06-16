<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css" />
        <link href="style.css" rel="stylesheet" />
        <link href="city.css" rel="stylesheet" />
    	<title>Acropolis</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
        <script type="text/javascript">
			var obj = document.getElementById('message_area');
			obj.scrollTop = obj.scrollHeight;
			
			function addWallClass(){
				$('#wall').removeClass('wall');
				$('#wall').addClass('wall_hover');
				
			}
			function removeWallClass(){
				$('#wall').removeClass('wall_hover');
				$('#wall').addClass('wall');
			}
			
			
			function wallhover(){
					document.walledcity.src='images/city/buildings/hover/wall.png';
			}

			function wallnormal(){
					document.walledcity.src='images/city/buildings/normal/wall.png';
			}
			
			
			
		</script>
    </head>
    
    <body>
    	<div id="container">
        	<div id="header">
            	<ul id="resources">
                	<li class="wood full"><span class="image">&nbsp;</span><span class="text">500,000</span></li>
                    <li class="iron"><span class="image">&nbsp;</span><span class="text">499,999</span></li>
                    <li class="clay"><span class="image">&nbsp;</span><span class="text">499,999</span></li>
                    <li class="population"><span class="image">&nbsp;</span><span class="text">1,000</span><small>/30,000</small></li>
                    <li class="coin"><span class="image">&nbsp;</span><span class="text">400</span></li>
                </ul><!-- ul#resources -->
            </div><!-- div#header -->
            <div id="gameboard">
            	<?php
				include("city.php");
				?>
            </div><!-- div#gameboard -->
            <div id="footer">
				<div id="chat">
				    <div id="message_area">
                       	<div class="message">
                        	<span class="normal">Username01:</span><p class="body">This is the message stored for username01.</p>
                        </div><!-- div.message -->


                        <div class="message">
                        	<span class="mod">Username01:</span><p class="body">This is the message stored for username01.</p>
                        </div><!-- div.message -->
                        <div class="message">
                        	<span class="admin">Username01:</span><p class="body">This is the message stored for username01.</p>
                        </div><!-- div.message -->
                        <div class="message">
                        	<span class="admin">Username01:</span><p class="body">This is the message stored for username01.</p>
                        </div><!-- div.message -->
                        <div class="message">
                        	<span class="admin">Username01:</span><p class="body">This is the message stored for username01.</p>
                        </div><!-- div.message -->
                        <div class="message">
                        	<span class="admin">Username01:</span><p class="body">This is the message stored for username01.</p>
                        </div><!-- div.message -->

                        <div class="message">
                        	<span class="admin">Username01:</span><p class="body">This is the message stored for username01. This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.This is the message stored for username01.</p>
                        </div><!-- div.message -->

                        <div class="message">
                        	<span class="admin shout">Username01:</span><p class="body shout">This is the message stored for username01.</p>
                        </div><!-- div.message -->

                        <div class="message">
                        	<span class="normal">Username01:</span><p class="body">This is the message stored for username01.</p>
                        </div><!-- div.message -->

					</div><!-- div#message_area -->
                                    <form method="post" action="">
                    	<input type="text" name="chat_message" id="chat_msg" />
                        <input type="submit" name="send" value=" &raquo; " />
                    </form>    
 
                </div>
            	<!-- div#chat -->
                
                <div id="details">
                	<span>Player: <span>Username</span></span><br />
                    <span>Points: <span>1,750,000</span></span><br />
                    <span>Rank: <span> 1,750</span></span>
                    <ul id="mini_menu">
                    	<li>messages</li>
                        <li>alliance</li>
                        <li>reports</li>
                        <li>map</li>
                        <li>More</li> <!-- link to city list, settings, etc -->
                    </ul><!-- ul#mini_menu -->
                </div><!-- div#details -->
            </div><!-- div#footer -->
        </div><!-- div#container -->
    </body>
</html>