<?php 
	if (isset($_POST['submit'])){
		foreach($_POST as $key => $value) {
			$key = explode ("-", $key);
			$key = end($key);
			$key = explode("submit",$key);
			$key = end($key);
			
			if($_POST['quantity-'.$key] <= 0) {
				unset($_SESSION['cart'][$key]);
			} else if($_POST['quantity-'.$key] >= 50) {
				$_SESSION['cart'][$key]['quantity'] = 50; 
			} else {
				$_SESSION['cart'][$key]['quantity'] = $value; 
			}
		}
	} error_reporting (0);
?>
<h1>View Cart</h1>
<a href="store.php?page=products" title="Go back to products page">Go back to products page</a>
<?php $sql = "SELECT * FROM products WHERE id_products IN ("; 				
					foreach($_SESSION['cart'] as $id => $value){
					$sql .= $id . ",";
				}
				$sql = substr($sql,0,-1).") ORDER BY name ASC";
				$query = mysql_query($sql);
		if(empty($query)) {
			echo"<br /><span class='i'>You need to add an item before you can view it here</span>";
		}
?>
<form method="POST" action="store.php?page=cart">
<fieldset>
	<table>
    	<tr>
        	<th>Name</th>
            <th>Quantity</th>
            <th>Price per item</th>
            <th>Total Cost</th>
        </tr>
        <?php 
		
			$sql = "SELECT * FROM products WHERE id_products IN ("; 				
				foreach($_SESSION['cart'] as $id => $value){
					$sql .= $id . ",";
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
                    	<td><?php echo $row['name'];?></td>
                        <td><input type="text" name="quantity-<?php echo $row['id_products'];?>" size="5" value="<?php echo $_SESSION['cart'][$row['id_products']]['quantity'];?>" /> </td>
                        <td><?php echo "$" . $row['price'];?></td>
                        <td><?php echo "$" . $_SESSION['cart'][$row['id_products']]['quantity']*$row['price'];?></td>
                       </tr>
                    <?php
				} }
				?>
       
       
       
        <tr>
        	<td></td>
            <td></td>
            <td>Total Price:</td>
            <td><?php echo "$" .  $total_price;?></td>
        </tr>
    </table>
    	<input type="submit" name="submit" value="Update Cart" /><fieldset>
</form>
<p> To remove an item, set quantity to 0 </p>