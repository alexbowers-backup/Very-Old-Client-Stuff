<?php
require('php/settings.php');
include('php/cookie_login.php');
require('header.php');
require('php/text_format.php');

if (isset($_GET['msg'])) {
	switch ($_GET['msg']) {
		case 0:
			echo '<p>Registration success. You will soon receive a confirmation email.</p>';
		break;
		case 1:
			echo '<p>Your account has been successfully confirmed. Congratulations.</p>';
		break;
		case 2:
			echo '<p>Your password has been successfully reset. Congratulations.</p>';
		break;
		case 3:
			echo '<p>A password reset email has been sent.</p>';
		break;
		case 4:
			echo '<p>Your settings have been saved. Please note that if you changed an email or reset your password, you may need to re-confirm your email or login again.</p>';
		break;
		case 5:
			echo '<p>Email resent.</p>';
		break;
		case 6:
			echo '<p>Thanks, you will be notified via email when we process your payment.</p>';
		break;
		case 7:
			echo '<p>Your account has been successfully destroyed. Well done.</p>';
		break;
	}
}

if (isset($_SESSION['email'])) {
	if (mysql_num_rows(mysql_query("SELECT * FROM accounts WHERE email='$email' AND admin=1")) > 0) {
		$is_admin = true;
	}
}

?>

<div id="main_welcome">
<?php if (!isset($_SESSION['email'])) { ?>
	<div class="content_box inverse" style="clear: both;">
        <h1>Welcome to Spark Lemon</h1>
        <hr />
        <div class="col-container">
            <div class="col">
				<img src="images/icons/dk_cart.png" alt="Buy" style="padding-right:10px; float:left;" />
                <h2>Buy</h2>
                <p>When life gives you lemons, you make lemonade.  Here at Spark Lemon, we believe in that same concept.  Talented in programing but not music or graphics?  Or the other way around?  Get the stuff you'll need here!</p>
            </div>
            <div class="col">
				<img src="images/icons/dk_card.png" alt="Sell" style="padding-right:10px; float:left;" />
                <h2>Sell</h2>
                <p>Want to use your skill as a programmer, graphics designer, composer, or developer to make money?  Sell your stuff here and see it in others peoples projects.</p>
            </div>
            <div class="col">
				<img src="images/icons/dk_globe.png" alt="Collaborate" style="padding-right:10px; float:left;" />
                <h2>Collaborate</h2>
                <p>Soon, people of all different skills will be able to help and share ideas for game projects on Spark Lemon.  Coming soon!</p>
            </div> 
        </div>
	</div>
	<?php }; ?>
</div>
<div class="clearfloat">
    <div id="main_featured">
        <div class="content_box" style="clear: both;">
            <h2>Featured</h2>   
            <a id="back" href="#"></a><a id="forward" href="#"></a>   
            <div id="fade-container" style="height: 280px; width: 560px; margin: 10px auto; margin-top: 24px;">
                <span id="fade">
                    <?php
                        $query = mysql_query("SELECT * FROM resources WHERE feature_date>0 AND hidden=0 AND queued=0 ORDER BY feature_date DESC LIMIT 3");
                        while ($row = mysql_fetch_array($query)) {
                            echo '<a href="item/'.$row['id'].'/'.sanitize_title_with_dashes($row['name']).'"><img src="'.$row['preview'].'" alt="'.$row['name'].'" title="'.$row['name'].'" /></a>';
                        }
                    ?>
                </span>
            </div>
            <!--<ul>
            <?php
                $query = mysql_query("SELECT * FROM resources WHERE feature_date>0 AND hidden=0 AND queued=0 ORDER BY feature_date DESC LIMIT 3");
                while ($row = mysql_fetch_array($query)) {
                    echo '<li><a href="item/'.$row['id'].'/'.sanitize_title_with_dashes($row['name']).'"><img src="'.$row['thumbnail'].'" alt="'.$row['name'].'" title="'.$row['name'].'" /></a></li>';
                }
            ?>
            </ul>-->
        </div>
    </div>
    <div id="main_about">
        <div class="content_box" style="clear: both;">
            <h2>About Us</h2>
            <p>We're an online marketplace intended for game developers, programmers, composers, and artists; both independent and professional.</p>
		<p><a href="about">Learn more...</a></p>

        </div>
    </div>
</div>
<div id="main_recent">
	<div class="content_box">
	<h2>Recent Files</h2>
		<?php
		if (!$is_admin) {
			$query = mysql_query("SELECT * FROM resources WHERE hidden=0 AND queued=0 ORDER BY date DESC LIMIT 7");
		}
		else { // admins can see hidden ones
			$query = mysql_query("SELECT * FROM resources WHERE queued=0 ORDER BY date DESC LIMIT 7");
		}
		$i = 0;
		while ($row = mysql_fetch_array($query)) {
			$invisible_modifier = '';
			if ($row['hidden'] == 1) { $invisible_modifier = 'style = "opacity: 0.2;"'; }
			echo '<a href="item/'.$row['id'].'/'.sanitize_title_with_dashes($row['name']).'"><img src="'.$row['thumbnail'].'" alt="'.$row['name'].'" title="'.$row['name'].'" '.$invisible_modifier.'/></a>';
			$i++;
		}
		while ($i < 7) {
			echo '<a href="#"><img src="images/item_no_preview.png" alt="Preview" /></a>';
			$i++;
		}
		?>
	</div>
	<script type="text/javascript" src="<?php echo $prefs_sitebase; ?>/min/f=js/jquery.cycle.lite.1.0.min.js"></script>
    <script type="text/javascript">$('#fade').cycle({
		prev:   '#back', 
		next:   '#forward',
		timeout: 5000,
		pause: true
	});</script>
</div>
<?php

require('footer.php');
?>
