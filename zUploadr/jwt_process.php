<?php
	include('jwt.php');
	
	$payloadOneMonth = array(
					"iss" => $sellerIdentifier,
					"aud" => "Google",
					"typ" => "google/payments/inapp/item/v1",
					"exp" => time() + 2592000,
					"iat" => time(),
					"request" => array(
						"name" => "One Month",
						"description" => "One Month of zUploadr+",
						"price" => "5.00",
						"currencyCode" => "GBP",
						"sellerData" => "user_id:1124245,offer_code:3098576987,afflicate:aksdfbovu9j",
						)
					);
	$payloadThreeMonths = array(
					"iss" => $sellerIdentifier,
					"aud" => "Google",
					"typ" => "google/payments/inapp/item/v1",
					"exp" => time() + 7776000,
					"iat" => time(),
					"request" => array(
						"name" => "Three Months",
						"description" => "Three Months of zUploadr+",
						"price" => "14.00",
						"currencyCode" => "GBP",
						"sellerData" => "user_id:1124245,offer_code:3098576987,afflicate:aksdfbovu9j",
						)
					);
	$payloadSixMonths = array(
					"iss" => $sellerIdentifier,
					"aud" => "Google",
					"typ" => "google/payments/inapp/item/v1",
					"exp" => time() + 15552000,
					"iat" => time(),
					"request" => array(
						"name" => "Six Months",
						"description" => "Six Months of zUploadr+",
						"price" => "25.00",
						"currencyCode" => "GBP",
						"sellerData" => "user_id:1124245,offer_code:3098576987,afflicate:aksdfbovu9j",
						)
					);
	$payloadOneYear = array(
					"iss" => $sellerIdentifier,
					"aud" => "Google",
					"typ" => "google/payments/inapp/item/v1",
					"exp" => time() + 31104000,
					"iat" => time(),
					"request" => array(
						"name" => "One Year",
						"description" => "One Year of zUploadr+",
						"price" => "45.00",
						"currencyCode" => "GBP",
						"sellerData" => "user_id:1124245,offer_code:3098576987,afflicate:aksdfbovu9j",
						)
					);
					
	$oneMonthToken = JWT::encode($payloadOneMonth, $sellerSecret);
	$threeMonthsToken = JWT::encode($payloadThreeMonths, $sellerSecret);
	$sixMonthsToken = JWT::encode($payloadSixMonths, $sellerSecret);
	$oneYearToken = JWT::encode($payloadOneYear, $sellerSecret);