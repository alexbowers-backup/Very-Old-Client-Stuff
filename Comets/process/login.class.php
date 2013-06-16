<?php
	require_once('user.class.php');
	class Login extends User {

		public function login_query(){
			return "SELECT `member_no` FROM `comets`.`member` WHERE `email_address` = '".$this->email."' AND `password` = '".md5($this->password)."'";
		}
	}
?>