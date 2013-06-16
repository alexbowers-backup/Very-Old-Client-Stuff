<?php
session_start();
require('jwt.php');
switch($_GET['p']){
			case "1mo":
				$name = "One Month";
				$value = "0.01";
				break;
			case "3mo":
				$name = "Three Months";
				$value = "14.00";
				break;
			case "6mo":
				$name = "Six Months";
				$value = "25.00";
				break;
			case "12mo":
				$name = "Twelve Months / One Year";
				$value = "45.00";
				break;
			default:
				// return error
				break;
		}
$processing = array(
					"iss" => '02039355673566556322',
					"aud" => "Google",
					"typ" => "google/payments/inapp/item/v1",
					"exp" => time() + 3600,
					"iat" => time(),
					"request" => array(
						"name" => $name,
						"description" => $name . " of [zUploadr+]",
						"price" => $value,
						"currencyCode" => "GBP",
						"sellerData" => "user_id:".$_SESSION['uid']
					)
				);
return 'data';
//return JWT::encode($processing, 'KdKdRqxmWQYKzeuPybVa_Q');
?>