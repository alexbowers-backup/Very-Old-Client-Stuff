<?php
$page_title = "About";
$js_script = '<script src="http://platform.twitter.com/anywhere.js?id=Ocx1WGkML7QSvdtmlWvhA&v=1" type="text/javascript"></script>
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
<p>Welcome to Spark Lemon!  We're glad you're here. We are an online marketplace that helps you buy, or sell, game resources for game development.  At the moment we're in beta, so please excuse us of any spelling mistakes, technical errors, or mishaps of any kind.  If you do find some bug or have a comment or question, you can contact us by email at <strong>c<span style="display:none;">hidden</span>o<span style="display:none;">h</span>n<span style="display:none;">i</span>t<span style="display:none;">d</span>a<span style="display:none;">e</span>c<span style="display:none;">n</span>t@sparklemon.com</strong>, or send @SparkLemonWeb a tweet on Twitter.</p>
<h2>Getting Started</h2>
<p>First things first:  are you making a game and want to buy something?  Or do you want to sell a script/plugin, sound, graphic, or engine?</p>
<h3>I want to sell:</h3>
<p>Awesome!  We're just beginning, so we need your help! First find the file you want to sell, along with any documentation you have for it.
Next, go to your <em><a href="/account/settings.php">account</a></em> page (you must be logged in) and upload <strong>three</strong> different files:
<ul>
    <li>A <strong>thumbnail</strong> file (100 x 100 pixels)</li>
    <li>A <strong>preview</strong> file (560 x 280 pixels)</li>
    <li>A *.<strong>zip</strong> file, containing a demo file (if necessary) and the files a buyer will download</li>
</ul>
Inside this zip archive, please place your files into two folders: <em>demo</em> and <em>paid</em>.  After you've uploaded these three files through your <em><a href="/account/settings.php">account</a></em>, click “<em><a href="http://sparklemon.com/submit.php">want to submit an item?</a></em>” (located below the files section). Fill out the necessary information. After you have finished, hit "Submit,” and we'll soon send you an email in reply.</p>
<h3>I want to buy:</h3>
<p>Great! Have a look at all of our files by visiting the <a href="/browse/newer"><em>browse</em></a> page. If you want to buy a file, you may add credits by by clicking the "credits" link at the top of a page. You can either pay with either a PayPal account or a major credit card.</p>
<h2>Spread the Word</h2>
<p>Feel like telling others about Spark Lemon? Mention it on places such as <a href="http://twitter.com">Twitter</a>, or use one of the following images in a signature.</p>
<p>
    <img src="http://sparklemon.com/images/promo/littlebanner.png" alt="Spark Lemon" />
    <code>[url=http://www.sparklemon.com][img]http://sparklemon.com/images/promo/littlebanner.png[/img][/url]</code>
</p>
<p>
    <img src="http://sparklemon.com/images/promo/littlelemon.png" alt="Spark Lemon" />
    <code>[url=http://www.sparklemon.com][img]http://sparklemon.com/images/promo/littlelemon.png[/img][/url]</code>
</p>
<p>
    <img src="http://sparklemon.com/images/promo/bigbanner.png" alt="Spark Lemon" />
    <code>[url=http://www.sparklemon.com][img]http://sparklemon.com/images/promo/bigbanner.png[/img][/url]</code>
</p>
<p>
    <img src="http://sparklemon.com/images/promo/biglemon.png" alt="Spark Lemon" />
    <code>[url=http://www.sparklemon.com][img]http://sparklemon.com/images/promo/biglemon.png[/img][/url]</code>
</p>

<h2>FAQs</h2>
<p><strong>I am selling a resource.  How much money will I get?</strong></p>
<p>There will be a 50:50 split; you will get 50%, and we will get 50%.</p>
<p><strong>How much money do I need to make before I can request a payout?</strong></p>
<p>Once you make over $15, you can request a payout to your PayPal account.  Go to <em><a href="/account/settings.php">account</a></em> when you've got $15+ and click "Request Payout".</p>
<?php
require('footer.php');
?>
