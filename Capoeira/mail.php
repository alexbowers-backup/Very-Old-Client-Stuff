<?php
                 if(isset($_POST['name'])){
                 	$name = trim($_POST['name']);
                 } else {
                 	$errors[] = "Name not entered.";
                 }
                 if(isset($_POST['email'])){
                 	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                 		$email = trim($_POST['email']);
                 	} else {
                 		$errors[] = "Email not valid.";
                 	}
                 } else {
                 	$errors[] = "Email not entered.";
                 }
                 if(isset($_POST['message'])){
                 	$message = trim($_POST['message']);
                 } else {
                 	$errors[] = "Message not entered.";
                 }

                 if(empty($errors)){
                 	mail($to,$subject,$message);
                 	header('Location: about.php?success');
                 } else {
                 	$err = serialize($errors);
                 	header('Location: about.php');
                 }