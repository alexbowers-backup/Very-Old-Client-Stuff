<?php
	class user {
		
		public $username;
		public $userid;
		
		public static function is_logged_in(){
			if(isset($_SESSION['ukey']) && isset($_SESSION['uid'])){
				$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
				$ukey = mysqli_real_escape_string($dblink, $_SESSION['ukey']);
				$uid = mysqli_real_escape_string($dblink, $_SESSION['uid']);
				$result = mysqli_query($dblink, 'SELECT `id` FROM `login_sessions` WHERE `key` = "'.$ukey.'" AND `user_id` = "'.$uid.'"');
				if(mysqli_num_rows($result) > 0){
					return true;
				} else {
					self::logout();
					return false;
				}
			} else {
				return false;
			}
		}
		public static function new_password($input = null, $input2 = null, $input3 = null){
			if(self::is_logged_in()){
				if(isset($input,$input2,$input3)){
					if($input == $input2){
						$new_password = self::hash_data($input);
						$current_password = self::hash_data($input2);
						if(check_credentials(self::getUsername($_SESSION['uid']), $current_password)){
							$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
							$result = mysqli_query($dblink, 'UPDATE `user` SET `password` = "'.$new_password.'" WHERE `id` = "'.$_SESSION['uid'].'"');
							if(mysqli_affected_rows($dblink) > 0){
								return true;
							} else {
								return false;
							}
						} else {
							return false;
						}				
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		public static function new_email($input = null, $input2 = null){
			if(self::is_logged_in()){
				if(isset($input,$input2)){
					$new_email = $input;
					$password = self::hash_data($input2);
					if(self::check_credentials(self::getUsername($_SESSION['uid']), $password)){
						if(filter_var($new_email, FILTER_VALIDATE_EMAIL)){
							$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
							$result = mysqli_query($dblink, 'UPDATE `user` SET `email` = "'.$new_email.'" WHERE `id` = "'.$_SESSION['uid']);
							if(mysqli_affected_rows($dblink) > 0){
								return true;
							} else {
								return false;
							}
						} else {
							return false;
						}
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		public static function new_username($input = null, $input2 = null){
			if(self::is_logged_in()){
				if(isset($input,$input2)){
					$new_username = $input;
					$password = self::hash_data($input2);
					$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
					$result = mysqli_query($dblink, 'UPDATE `user` SET `username` = "'.$new_username.'" WHERE `id` = "'.$_SESSION['uid']);
					if(mysqli_affected_rows($dblink) > 0){
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		public static function upgrade_account($duration = null){
			if(self::is_logged_in()){
				if(isset($duration)){
					$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
					switch($duration){
						case 1:
							// trial
							$time = 604800;
							break;
						case 2:
							// One Month
							$time = 18144000;
							break;
						case 3: 
							// Three Months
							$time = 54432000;
							break;
						case 4:
							// Six Months
							$time = 108864000;
							break;
						case 5:
							// One Year
							$time = 217728000;
							break;
						case 6:
							// Life Time
							$time = 1814400000;
							break;
						default:
							$time = 604800;
							break;
					}
					$newTime = time() + $time;
					if(self::account_type() == 1){
						// Check if trial
						if(!self::trial_activated()){
							if($time != 604800){
								$time = $time + 604800;
								$trial = true;
							}
						}
					} elseif(self::account_type() == 2) {
						$result = mysqli_query($dblink, 'SELECT `upgrade_expire` FROM `user` WHERE `id` = "'.$_SESSION['uid'].'"');
						$one = mysqli_fetch_array($result);
						$two = $one[0];
						if($two != 0){
							$newTime = $one[0] + $time;
						}
					} else {
						return false;
					}
					if($trial){
						$extra = " , `trial_activated` = '1'";
					} else {
						$extra = "";
					}
					
					$result = mysqli_query($dblink, 'UPDATE `user` SET `upgrade_expire` = "'.$newTime.'"' . $extra . ' WHERE `id` = "'.$_SESSION['uid'].'"');
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		public static function trial_activated(){
			if(self::is_logged_in()){
				$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
				$result = mysqli_query($dblink, 'SELECT `trial_activated` FROM `user` WHERE `id` = "'.$_SESSION['uid'].'"');
				$one = mysqli_fetch_array($result);
				if($one == 1){
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		public static function downgrade_account(){
			$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
		}
		public static function account_type(){
			if(self::is_logged_in()){
				$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
				$result = mysqli_query($dblink, 'SELECT `account_type` FROM `user` WHERE `id` = "'.$_SESSION['uid'].'"');
				$level = mysqli_fetch_array($result);
				return $level[0];
			} else {
				return false;
			}
		}
		public static function getUserType(){
			if(self::is_logged_in()){
				$type = self::account_type();
				switch($type){
					case 1:
						return 'Normal';
						break;
					case 2:
						return 'Premium';
						break;
					case 3:
						return 'Corporate Owner';
						break;
					case 4:
						return 'Corporate Employee';
						break;
					case 5:
						return 'DMCA Company';
						break;
					case 6:
						return 'DMCA Agent';
						break;
					case 7:
						return 'Admin';
						break;
					case 8:
						return 'Owner';
						break;
					default:
						return 'Guest';
						break;
				}
			} else {
				return 'Guest';
			}
		}
		public static function getUserId($input = null){
			$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
			if(is_numeric($input)){
				return $input;
			} else {
				$one = filter_var($input, FILTER_VALIDATE_EMAIL);
				if($one){
					$type = 'email';
				} else {
					$type = 'username';
				}
			}
				$input = mysqli_real_escape_string($dblink, $input);

				$result = mysqli_query($dblink, 'SELECT `id` FROM `user` WHERE `'.$type.'` = "'.$input.'"');
				if(mysqli_num_rows($result) > 0){
					$f = mysqli_fetch_array($result, MYSQLI_ASSOC);
					return $f['id'];
				} else {
					return false;
				}
		}
		public static function getUsername($input = null){
			$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
			if(is_numeric($input)){
				$type = 'id';
			} else {
				$one = filter_var($input, FILTER_VALIDATE_EMAIL);
				if($one){
					$type = 'email';
				} else {
					$type = 'username';
				}
			}
				$input = mysqli_real_escape_string($dblink, $input);
				$result = mysqli_query($dblink, 'SELECT `username` FROM `user` WHERE `'.$type.'` = "'.$input.'"');
				if(mysqli_num_rows($result) > 0){
					$f = mysqli_fetch_array($result, MYSQLI_ASSOC);
					return $f['username'];
				} else {
					return false;
				}
		}
		public static function login($param1 = null,$password = null){
			$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
			if(isset($param1,$password)){
				$holder = filter_var($param1,FILTER_VALIDATE_EMAIL);
				if($holder === true){
					$email = $param1;
					$email = mysqli_real_escape_string($dblink, $email);
					$login_attempt = self::check_credentials($email, $password);
					if($login_attempt === true){
						// login successful
						$uniqid = uniqid();
						$userid = self::getUserId($email);
						$key = self::hash_data($password);
						mysqli_query($dblink, 'DELETE FROM login_sessions WHERE user_id = "'.$userid.'"');
						mysqli_query($dblink, 'INSERT INTO login_sessions SET user_id = "'.$userid.'" and key = "'.$key.'"');
						
						$_SESSION['ukey'] = $key;
						$_SESSION['uid'] = $userid;
						$_SESSION['username'] = self::getUsername($userid);
						return true;
					} else {
						return false;
					}
				} else {
					$user = $param1;
					$user = mysqli_real_escape_string($dblink, $user);
					$login_attempt = self::check_credentials($user, $password);
					if($login_attempt == true){
						// login successful
						$uniqid = uniqid();
						$userid = self::getUserId($user);
						$key = self::hash_data($password);
						mysqli_query($dblink, 'DELETE FROM `login_sessions` WHERE `user_id` = "'.$userid.'"');
						mysqli_query($dblink, 'INSERT INTO `login_sessions` (`user_id`,`key`) VALUES ("'.$userid.'","'.$key.'")');
						
						$_SESSION['ukey'] = $key;
						$_SESSION['uid'] = $userid;
						$_SESSION['username'] = self::getUsername($userid);
						return true;
					} else {
						return false;
					}
				}
			} else {
				return false;
			}
		} 
		public static function logout(){
			return true;
		}
		public static function register($email= null, $username = null, $password1 = null, $password2 = null){
			$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
			if(isset($email,$username,$password1,$password2)){
				if($password1 == $password2){
					$email    = mysqli_real_escape_string($dblink, $email);
					$username = mysqli_real_escape_string($dblink, $username);
					$password = self::hash_data($password1);
					mysqli_query($dblink, 'INSERT INTO `user` (`username`,`email`,`password`) VALUES ("'.$username.'","'.$email.'","'.$password.'")');
					if(mysqli_affected_rows($dblink) > 0){
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				// Not all data provided
				return false;
			}
		}
		public static function check_credentials($param1 = null, $password = null){
			$dblink = mysqli_connect('localhost','root','PPZXZkKazTG8e4qf','zuploadr');
			if(isset($param1)){
				$holder = filter_var($param1, FILTER_VALIDATE_EMAIL);
				if($holder == true){
					$type = 'email';
				} else {
					$type = 'username';
				}
				$param1 = mysqli_real_escape_string($dblink, $param1);
				if(isset($password)){
					$password = self::hash_data($password);
					$result = mysqli_query($dblink, 'SELECT id FROM user WHERE `'.$type.'` = "'.$param1.'" AND `password` = "'.$password.'"');
				} else {
					$result = mysqli_query($dblink, 'SELECT id FROM user WHERE `'.$type.'` = "'.$param1.'"');
				}
				if(mysqli_num_rows($result) > 0){
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		public static function hash_data($plain_text){
			return hash_hmac('sha256', $plain_text, '0'); //file_get_contents('login_secure_key.key'));
		}
	}
?>