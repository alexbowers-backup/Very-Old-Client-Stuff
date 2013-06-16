<?php
require('php/settings.php');
include('php/cookie_login.php');
require('header.php');

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
                <h2>Buy</h2>
                When life gives you lemons, you make lemonade.  Here at Spark Lemon, we believe in that same concept.  Talented in programing but not music or graphics?  Or the other way around?  Get the stuff you'll need here!
            </div>
            <div class="col">
                <h2>Sell</h2>
                Want to use your skill as a programmer, graphics designer, composer, or developer to make money?  Sell your stuff here and see it in others peoples projects.
            </div>
            <div class="col">
                <h2>Collaborate</h2>
                Soon, people of all different skills will be able to help and share ideas for game projects on Spark Lemon.  Coming soon!
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
                            echo '<a href="item/'.$row['id'].'"><img src="'.$row['preview'].'" alt="'.$row['name'].'" title="'.$row['name'].'" /></a>';
                        }
                    ?>
                </span>
            </div>
            <!--<ul>
            <?php
                $query = mysql_query("SELECT * FROM resources WHERE feature_date>0 AND hidden=0 AND queued=0 ORDER BY feature_date DESC LIMIT 3");
                while ($row = mysql_fetch_array($query)) {
                    echo '<li><a href="item/'.$row['id'].'"><img src="'.$row['thumbnail'].'" alt="'.$row['name'].'" title="'.$row['name'].'" /></a></li>';
                }
            ?>
            </ul>-->
        </div>
    </div>
    <div id="main_about">
        <div class="content_box<?php if (rand(1,3)==2) { echo ' inverse'; }?>" style="clear: both;">
            <h2>About Us</h2>
            <p>Spark Lemon is an online marketplace for game developers, artists, programmers, and composers; both professional and individual.</p>
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
		$i=0;
		while ($row=mysql_fetch_array($query)) {
			$invisible_modifier = '';
			if ($row['hidden']==1) { $invisible_modifier = 'style = "opacity: 0.2;"'; }
			echo '<a href="item/'.$row['id'].'"><img src="'.$row['thumbnail'].'" alt="'.$row['name'].'" title="'.$row['name'].'" '.$invisible_modifier.'/></a>';
			$i++;
		}
		while ($i<7) {
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
<?php if (isset($_SESSION['email'])) : ?>
        
<?php
endif;

/*if (!isset($_SESSION['email'])) {
	echo '<p><a href="account/login.php">Login</a> - <a href="account/register.php">Register</a></p>';
}
else {
	$email=$_SESSION['email'];
	$query=mysql_query("SELECT credits FROM accounts WHERE email='$email' LIMIT 1");
	$row=mysql_fetch_array($query);
	$avatar=user_get_avatar(user_get_id($_SESSION['email']));
	if ($avatar=="") {
		echo '<img src="'.gravatar_get_url($_SESSION['email']).'" class="gravatar" style="float: right; clear: both; margin-top: 15px;" />';
	}
	else
	{
		echo '<img src="images/avatars/'.$avatar.'" class="gravatar" style="float: right; clear: both; margin-top: 15px;" />';
	}
	echo '<h1>Welcome to Stake</h1>';
	echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pulvinar, augue sed vestibulum laoreet, felis diam fermentum augue, eu facilisis felis ipsum ac metus. Aenean elementum nunc a magna luctus egestas. Fusce luctus, dui ac tristique pharetra, magna magna dapibus sem, quis dignissim turpis dui luctus velit. Pellentesque tellus nulla, luctus eget cursus ac, commodo sed nunc.</p><p>Morbi pretium dui sit amet elit aliquam vitae blandit ante ultricies. Aenean tortor tellus, rhoncus ac elementum et, tristique nec diam. Mauris porta egestas odio, eget luctus neque dapibus vitae. Vivamus porta viverra malesuada. Phasellus felis augue, tristique eget interdum et, lobortis quis erat. Sed fringilla consectetur tortor. Nulla varius varius massa et adipiscing. Sed nunc metus, tincidunt ac interdum volutpat, interdum eu purus.</p>';
}*/

require('footer.php');
?>