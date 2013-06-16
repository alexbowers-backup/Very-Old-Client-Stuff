<?php

function code_create(){
	$length = 4;
	$blocks = 4;
	
	$string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	
	$str = "";
	
	for($i = 0; $i < $blocks; $i ++){
		for($j = 0; $j < $length; $j++){
			$str .= substr($string, rand(1, strlen($string)), 1);
		}
		$str .= "-";
	}
	return $str;
}

function giftcard_make($code, $from, $to, $amount, $expiry = 60){
	echo $code . "<br />";
}

function remove_expired(){
	$query = mysql_query("UPDATE giftcard_create SET `expiry` = `expiry` -1 WHERE `completed` = 0");
	
	$query2 = mysql_query("SELECT * FROM giftcard_create WHERE `expiry` < 1");
	$num2 = mysql_num_rows($query2);
	
	$content = "Sorry [name], \n\r We regret to inform you that the giftcard you sent to [name2] with a value of [credit] has not been claimed within the 60 day limit we impose on these transaction. \n\r\n\r The reason we impose these transactions is because when you sent the credit, we deducted it from your account, and since it hasn't been claimed, over the next 24 hours you will be reinstated with the money you sent, to either try to send again, or keep. \n\r Sorry for any inconvenient \n\r \n\r - Spark Lemon Team";
	if($num2 != 0){
		while($row2 = mysql_fetch_assoc($query2)){
			mysql_query("DELETE FROM giftcard_create WHERE id={$row2['id']}");
			send_mail($row2['from_id'],"Giftcard Expiry | Bounced Back",$content);
		}
	}
	
	
}

function send_mail($to_id,$subj,$content){
	
}
echo giftcard_make(code_create(),"alex", "sarah", 10.00);
?>