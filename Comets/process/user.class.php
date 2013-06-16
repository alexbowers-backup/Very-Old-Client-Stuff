<?php
	class User {
		private $firstname;
		private $lastname;
		private $email;
		private $dob;
		private $address;
		private $subscriber;
		private $password;
		private $password_confirm;
		
		private $is_admin = false;
		private $signed_in = false;  

		public function __construct(){
			if(session_id() == ''){
				session_start();
			}
			if(isset($_SESSION['uid'])){
				$this->signed_in =  true;
				$query = mysql_query("SELECT `acc_type` FROM `member` WHERE `member_no` = {$_SESSION['uid']}");
				$result = mysql_result($query, 0);
				if($result == 2){
					$this->is_admin = true;
				}
			}
		}
		public function update_data(){
			$query = mysql_query("UPDATE `member` SET `email_address` = '".$this->email."', `address_line_one` = '".$this->address."' WHERE `member_no` = {$_SESSION['uid']}");
			return true;
		}
		public function logout(){
			if($this->signed_in){
				unset($_SESSION['uid']);
				$this->signed_in = false;
			}
		}
		public function user_exists(){
			$query = mysql_query("SELECT `member_no` FROM `comets`.`member` WHERE `email_address` = '".$this->email."'");
			echo mysql_error();
			if(mysql_num_rows($query) == 0){
				return false;
			} else {
				return true;
			}
		}

		public function __get($property){
			if(property_exists($this,$property)){
				return $this->$property;
			} else {
				return false;
			}
		}
		public function __set($property, $value){
			if(property_exists($this,$property)){
				$this->$property = $value;
			}
		}
		public function __isset($property){
			return isset($this->{$property});
		}
	}
