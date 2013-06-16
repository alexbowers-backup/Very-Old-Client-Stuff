<?php
$page_title = "About";
$js_script = '<script src="http://platform.twitter.com/anywhere.js?id=YOUR_API_KEY&v=1" type="text/javascript"></script>
<script type="text/javascript">
  twttr.anywhere(function (T) {
    T.hovercards();
  });
</script>';
require('php/settings.php');
include('php/cookie_login.php');
require('header.php');
?>
<h1>About</h1>
<p>Welcome to Spark Lemon!  We're glad you're here.  We are an online marketplace that helps you buy, or sell, game resources for game development.  At the moment we're in beta, so please excuse us of any spelling mistakes, technical errors, or mishaps of any kind.  If you do find something, or if you have a comment or question, you can contact us by email at <strong>c<span style="display:none;">hidden</span>o<span style="display:none;">h</span>n<span style="display:none;">i</span>t<span style="display:none;">d</span>a<span style="display:none;">e</span>c<span style="display:none;">n</span>t@sparklemon.com</strong>, or send us a tweet on twitter @SparkLemonWeb .</p>
<h2>Getting Started</h2>
<p>First things first:  Are you making a game and want to buy something?  Or do you want to sell a script/plugin, sound, graphic, or engine?</p>
<h4>I want to sell:</h4>
<p>Awesome!  We're just getting started, so we will need you help!  First thing you need to do is make your file, along with any documentation necessary to go with it (if needed).  Next, you need to go to "account" (once you've logged in) and upload a thumbnail file (100 by 100), a preview file (560 by 280), and a zip file containing a demo file (if needed) and the actual file you're going to sell.  Please put the files in two different folders (named demo and paid).  After that, underneath “Your Files” click “want to submit an item?”.  Then, you can fill out all the information.  Once you're done, just click “Submit”, and we'll send you an email soon after with a reply.</p>
<h4>I want to buy:</h4>
<p>Great!  Have a look at all our files by visiting the <a href="/browse/newer">browse</a> page.  You can add credits to buy a file by clicking "credits" at the top.  You can either ues your PayPal account to pay, or a major credit card.</p>
<h2>FAQs</h2>
<p>We'll be adding questions here and answers here soon.</p>
<?php
require('footer.php');
?>