<?php
require('../php/settings.php');
$page_title = "Contact";
$js_script = '<script src="http://platform.twitter.com/anywhere.js?id=YOUR_API_KEY&v=1" type="text/javascript"></script>
<script type="text/javascript">
  twttr.anywhere(function (T) {
    T.hovercards();
  });
</script>';
include("../header.php");
?>
<h1>Contact</h1>
<p>Want to get in touch with us? You've got a variety of options!</p>
<h2>Email</h2>
<p>contact@sparklemon.com</p>
<h2>Twitter</h2>
<p>Send us a tweet over at @SparkLemon.</p>
<?
include("../footer.php");
?>