<?php
	session_start();
	require_once("includes/connect.php");
	if(isset($_GET['page'])){
		$pages = array("products","cart");
		if(in_array($_GET['page'],$pages)){
	          $page = $_GET['page'];
	    } else {
			$page = "products";
		}
    } else {
		$page = "products";	
	}
?>
<html>
	<head>
    	<link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Shopping Cart Tutorial</title>
    </head>
    <body>
    	<div id="container">
        	<div id="main"><?php require($page . ".php"); ?></div>
            <div id="sidebar"><h1>Cart</h1>
<?php
	if(isset($_SESSION['cart'])) {
		$sql = "SELECT * FROM products WHERE id_products IN ("; 
		foreach($_SESSION['cart'] as $id => $value){
			$sql .= $id . ",";
		}
		$sql = substr($sql,0,-1) . ") ORDER BY id_products ASC";
		$query = mysql_query ($sql);
		if(!empty($query)){
	while($row = mysql_fetch_assoc($query)) {
?>
	<p><?php echo $row['name']; ?><?php echo " x " . $_SESSION['cart'][$row['id_products']]['quantity']; ?></p>
   
<?php 
	}
	}else {
		echo "<i>You need to add an item to your cart for it to be visible here<?i><br />";
	}
	}else{
		echo "<p>Your cart is empty. <br />Please add some products</p>";
	} 
	echo "<a href='index.php?page=cart'>Go to Cart</a>";
?></div>
        </div>
    </body>
</html>
