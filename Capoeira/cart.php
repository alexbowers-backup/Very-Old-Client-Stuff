<?php 
	error_reporting (0);
	$message="";
	if (isset($_GET['update'])){
		foreach($_POST as $key => $value) {
			$key = explode ("-", $key);
			$key = end($key);
			$key = explode("update",$key);
			$key = end($key);
			
			if($_POST['quantity-'.$key] <= 0) {
				unset($_SESSION['cart'][$key]);
			} else if($_POST['quantity-'.$key] >= 50) {
				$_SESSION['cart'][$key]['quantity'] = 50; 
			} else {
				$_SESSION['cart'][$key]['quantity'] = $value; 
			}
		}
	} 

?>
<h1>View Cart</h1>
<a href="store.php?page=products" title="Go back to products page">Go back to products page</a>
<?php $sql = "SELECT * FROM store WHERE id_products IN ("; 				
					foreach($_SESSION['cart'] as $id => $value){
						if($id != 'total_price'){
					$sql .= $id . ",";
				}
				}
				$sql = substr($sql,0,-1).") ORDER BY name ASC";
				$query = mysql_query($sql);
		if(empty($query)) {
			echo"<br /><span class='i'>You need to add an item before you can view it here</span>";
		}
?>
<form method="POST" id="Payment_Cart_Form" name="Form1">
	<input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="upload" value="1" />
                <input type="hidden" name="business" value="bowersbros@gmail.com" />
	<span class="checkout_message"><?=$message;?></span>
<fieldset>
	<table>
    	<tr>
        	<th>Name</th>
            <th>Quantity</th>
            <th>Price per item</th>
            <th>Total Cost</th>
        </tr>
        <?php 
		
			$sql = "SELECT * FROM store WHERE id_products IN ("; 				
				foreach($_SESSION['cart'] as $id => $value){
					if($id != 'total_price'){
						$sql .= $id . ",";
					}	
				}
				$sql = substr($sql,0,-1).") ORDER BY name ASC";
				$query = mysql_query($sql);
				$total_price = 0;
				if(!empty($query)){
				while($row = mysql_fetch_array($query)) {
					$subtotal = $_SESSION['cart'][$row['id_products']]['quantity']*$row['price'];
					$total_price += $subtotal;
					?>
                    <tr>
                    	<?php
                    		$_SESSION['cart'][$row['id_products']]['name'] = $row['name'];
                    	?>
                    	<td><?php echo $row['name'];?></td>
                        <td><input type="text" name="quantity-<?php echo $row['id_products'];?>" size="5" value="<?php echo $_SESSION['cart'][$row['id_products']]['quantity'];?>" /> </td>
                        <td><?php echo "$" . $row['price'];?></td>
                        <?php
                        $_SESSION['cart'][$row['id_products']]['item_id'] = $row['id_products'];
                        	$_SESSION['cart'][$row['id_products']]['ea_price'] = $row['price'];
                        	$_SESSION['cart'][$row['id_products']]['price'] =  $_SESSION['cart'][$row['id_products']]['quantity']*$row['price'];
                        ?>
                        <td><?php echo "$" . $_SESSION['cart'][$row['id_products']]['quantity']*$row['price'];?></td>
                       </tr>
                    <?php
				} }
				?>
				 <?php
                $x = 0;
                  foreach($_SESSION['cart'] as $item){
                    $x++;
                      echo '<input type="hidden" name="item_name_'.$x.'" value="'.$item['name'].'"/>
                                  <input type="hidden" name="amount_'.$x.'" value="'.$item['ea_price'].'"/>
                                  <input type="hidden" name="quantity_'.$x.'" value="'.$item['quantity'].'"/>';
                                  $product_id_array .= $item['item_id']."-".$item['quantity'].',';
                  }
                ?>
       
       
       
        <tr>
        	<td></td>
            <td></td>
            <td>Total Price:</td>
            <?php
            	$_SESSION['Payment_Amount'] = $total_price;
            ?>
            <td><?php echo "$" .  $total_price;?></td>
        </tr>
    </table>
    <input type="hidden" hname="custom" value="<?=$product_id_array;?>" />
     <input type="hidden" name="notify_url" value="http://zando.co.uk/zando/clients/webProject/ipn.php" />
                <input type="hidden" name="return" value="http://zando.co.uk/zando/clients/webProject/store.php?success" />
                <input type="hidden" name="rm" value="2" />
                <input type="hidden" name="cbt" value="Return to Zando" />
                <input type="hidden" name="cancel_return" value="http://zando.co.uk/zando/clients/webProject/store.php?cancel" />
    	<input type="button" name="update" value="Update Cart" onclick="return OnButton1();"/>
    	<input type="button" name="checkout" value="Checkout with PayPal" onclick="return OnButton2();"/><fieldset>
</form>
<p> To remove an item, set quantity to 0 </p>
<script type="text/javascript">
	function OnButton1(){
		document.getElementById('Payment_Cart_Form').action = "store.php?page=cart&update";
		document.getElementById('Payment_Cart_Form').submit();
		return true;
	}
	function OnButton2(){
		document.getElementById('Payment_Cart_Form').action = "https://www.paypal.com/cgi-bin/webscr";
		document.getElementById('Payment_Cart_Form').submit();
		return true;
	}
</script>