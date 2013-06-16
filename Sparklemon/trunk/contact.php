<?php
require('php/settings.php');
$page_title = "Contact";
$js_script = '<script src="http://platform.twitter.com/anywhere.js?id=Ocx1WGkML7QSvdtmlWvhA&v=1" type="text/javascript"></script>
<script type="text/javascript">
  twttr.anywhere(function (T) {
    T.hovercards();
  });
</script>';
include("header.php");
?>
<h1>Contact</h1>
<p>Want to get in touch with us? At present, you've got a few options.</p>
<!--<h2>Email</h2>
<p>c<span style="display:none;">hidden</span>o<span style="display:none;">h</span>n<span style="display:none;">i</span>t<span style="display:none;">d</span>a<span style="display:none;">e</span>c<span style="display:none;">n</span>t@sparklemon.com</p>
<h2>Twitter</h2>
<p>Send a tweet over to @SparkLemonWeb.</p>-->
<ul>
	<li><strong>Email</strong>: c<span style="display:none;">hidden</span>o<span style="display:none;">h</span>n<span style="display:none;">i</span>t<span style="display:none;">d</span>a<span style="display:none;">e</span>c<span style="display:none;">n</span>t@sparklemon.com</li>
    <li><strong>Twitter</strong>: Send a tweet over to @SparkLemonWeb.</li>
</ul>
<?
include("footer.php");
?>
