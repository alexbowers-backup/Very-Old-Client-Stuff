<?php
					echo '<p><a href="results.php">Race Results</a></p>';
					if($user->signed_in){
						if($user->is_admin){
							echo '<p><a href="members.php">View member list</a></p>';
						}
						echo '<p><a href="profile.php">View profile</a></p>';
						echo '<p><a href="logout.php">Logout</a></p>';
					} else {
						echo '<p><a href="register.php">Register</a></p><p><a href="login.php">Login</a></p>';
					}
					echo '<p><a href="contact.php">Contact</a></p>';
				?>