<?php

	function logged_in(){
		if(isset($_SESSION['uname']) || isset($_SESSION['uid'])){
			if(check_login($_SESSION['uid'],$_SESSION['uname'])){
				if(isset($_SESSION['secret_key'])){
					if(isset($_SESSION['sk'],$_SESSION['sk4'],$_COOKIE['sk2'],$_COOKIE['sk3'])){
						if(validate_login($_SESSION['uid'],$_SESSION['sk'],$_COOKIE['sk2'],$_COOKIE['sk3'],$_SESSION['sk4'],$_SESSION['secret_key'])){
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
				unset($_SESSION['uname'],$_SESSION['uid']);
				return false;
			}
		} else {
			return false;
		}
	}
	function validate_login($uid,$sk,$sk2,$sk3,$sk4,$secret_key){
		$query = mysql_query('SELECT `sk5` FROM `users` WHERE `uid` = "{$uid}"');
		$sk5 = mysql_result($query,0);
		
		$compare_key = sha1($sk. sha1($sk4 . md5($uid . $sk2 . $sk3)) . $sk5);
		if($compare_key === $secret_key){
			return true;
		} else {
			return false;
		}
	}
	function check_login($uid,$uname) {
		// if match the data in database
	
		$query = mysql_query('SELECT "1" FROM `users` WHERE `uid` = "{$uid}" AND `username` = "{$uname}"');
		$result = mysql_result($query,0);
		if($result == '1') {
			return true;
		} else {
			return false;
		}
	}
	function create_secret_key($uid) {
		// set secret key, sk,sk2,sk3,sk4
		$sk3 = 'Az3TVuPQ$4T'; // always this
		$secret_key = sha1($sk. sha1($sk4 . md5($uid . $sk2 . $sk3)) . $sk5);
	}
?>