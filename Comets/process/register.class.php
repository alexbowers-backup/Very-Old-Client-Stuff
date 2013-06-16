<?php
	require_once('user.class.php');
	class Register extends User {

		public function password_validate(){
				if($this->password != $this->password_confirm){
					return false;
				}
				if(strlen($this->password) < 8){
					return false;
				} 
				if(strlen($this->password) > 16){
					return false;
				}  
					return true;

		}
		public function email_validate(){
			if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
				return false;
			} else {
				return true;
			}
		}
		public function register_query(){
			return $query = "INSERT INTO `comets`.`member` (
				`member_no` ,
				`first_name` ,
				`last_name` ,
				`email_address` ,
				`password` ,
				`address_line_one` ,
				`dob` ,
				`subscribed`
			) VALUES (
				NULL ,  
				'".$this->firstname."',  
				'".$this->lastname."',  
				'".$this->email."', 
				'".md5($this->password)."',  
				'".$this->address."', 
				'".$this->dob."',  
				'0'
			);";
		}
	}
?>