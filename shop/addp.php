<?php 
	include 'header.php';
	include 'connection.php'; 
	if (isset($_POST['add_pro'])) {
		extract($_POST);
		$ins ="INSERT INTO item values('','$item_name','$item_price',
										'$item_sprice','$item_type',
										'$item_q','now()')";
		$ex_ins = mysqli_query($con,$ins) or die(mysqli_error($con));
		if($ex_ins){
			echo "<script> alert('Product added successfuly!') </script>";
			echo "<script> window.open('home.php','_self') </script>";
		}
	}
?>
<table align="center" id="addp">
	<caption><h1>Give Item Detail</h1></caption>
	<form method="post" action="">
		<tr>
			<td><label>Item Name:</label></td>
			<td><input type="text" name="item_name" required="required"></td>
		</tr>
		<tr>
			<td><label>Item type:</label></td>
			<td>
				<select name="item_type" required="required" id="sel">
					<option value="memory card">Memory Card</option>
					<option value="handsfree">Handsfree</option>
					<option value="charger">Charger</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>Item Actual Price:</label></td>
			<td><input type="number" name="item_price" required="required"></td>
		</tr>
		<tr>
			<td><label>Item sale Price:</label></td>
			<td><input type="number" name="item_sprice" required="required"></td>
		</tr>
		<tr>
			<td><label>Item Quantity:</label></td>
			<td><input type="number" name="item_q" required="required"></td>
		</tr>
		<tr>
			<td><label></label></td>
			<td><input type="submit" value="Add Product" name="add_pro"></td>
		</tr>
	</form>
</table>
<?php include 'footer.php'; ?>