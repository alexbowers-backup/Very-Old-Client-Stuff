<?php
	require('includes/connect.php');

	$user = new User;
	class User {
		public function is_logged_in(){
			if(isset($_SESSION['uid'])){
				return true;
			} else {
				return false;
			}
		}
		public function password_reset($email){
			$code = uniqid('',true);
			mysql_query('UPDATE `members` SET `password` = "'.sha1($code).'" WHERE `email` = '.$email);
			$to = "";
			mail($to,'Password Reset','Password: ' . $code);
			return true;
		}
		public function logout(){
			unset($_SESSION['uid']);
			return true;
		}
		public function check_user_exists($email) {
			$query = mysql_query('SELECT `id` FROM `members` WHERE `email` = "'.$email.'"');
			if(mysql_num_rows($query) > 0){
				return true;
			} else {
				return false;
			}
		}
		public function is_admin($uid){
			$query = mysql_query('SELECT `acc_type` FROM `members` WHERE `id` = '.$uid);
			$result = mysql_result($query,0);
			if($result == 1){
				return true;
			} else {
				return false;
			}
		}
		public function check_login_details($email,$password) {
			$query = mysql_query('SELECT `id` FROM `members` WHERE `email` = "'.$email.'" AND `password` = "'.sha1($password).'"'); // Add check for if active = 1
			if(mysql_num_rows($query) > 0){
				return true;
			} else {
				return false;
			}
		}
		public function get_user_id($email,$password){
			$query = mysql_query('SELECT `id` FROM `members` WHERE `email` = "'.$email.'" AND `password` = "'.sha1($password).'"');
			if(mysql_num_rows($query) > 0){
				$uid = mysql_result($query,0);
				return $uid;
			} else {
				return false;
			}
		}
		public function login($uid) {
			$_SESSION['uid'] = $uid;
		}
		public function register($first_name,$last_name,$email,$dob,$graduation,$group_name,$master_name,$password,$bio,$code,$file,$username){
			if(empty($bio)){
				$bio = "Bio not provided";
			}
			mysql_query('INSERT INTO `members` (`username`,`first_name`,`last_name`,`email`,`dob`,`graduation`,`group_name`,`master_name`,`password`,`bio`,`activate_code`,`profile_pic`) VALUES ("'.$username.'","'.$first_name.'","'.$last_name.'","'.$email.'","'.$dob.'","'.$graduation.'","'.$group_name.'","'.$master_name.'","'.sha1($password).'","'.$bio.'","'.$code.'","'.$file.'")');
			
			return true;
		}
		public function  update_user($uid,$first_name,$last_name,$dob,$graduation,$group_name,$master_name,$bio,$file,$username){
			if(empty($bio)){
				$bio = "Bio not provided";
			}
			if($file != null){
				$picture_sql = ', `profile_pic` = "'.$file.'"';
			} else {
				$picture_sql = "";
			}
			mysql_query('UPDATE  `members` SET `username` = "'.$username.'", `first_name`= "'.$first_name.'",`last_name` = "'.$last_name.'",`dob` = "'.$dob.'",`graduation` = "'.$graduation.'",`group_name` = "'.$group_name.'",`master_name` = "'.$master_name.'",`bio` = "'.$bio.'" '.$picture_sql.' WHERE `id` = '.$uid);
			return mysql_error();
			return true;
		}
		public function send_activation_code($email,$code){
			// Click a link with this code to activate.
			// 
			$subject = "Activate your Capiero Account";
			$message = "To activate your account, visit this page: http://zando.co.uk/zando/clients/webProject/activate_account.php?code=".$code;
			mail($email,$subject,$message);
		}
		public function activate_account($code){
			mysql_query('UPDATE `members` SET `active`= 1 AND `activate_code` = "" WHERE `activate_code` = "'.mysql_real_escape_string($code).'"');
			return true;
		}
	}