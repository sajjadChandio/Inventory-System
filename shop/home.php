<?php 
	include 'header.php';
	include 'connection.php';
?>
<form method="post" action="buy.php">
<br><table id="tab" border="1" cellspacing="0px" cellpadding="10px" width="1000px" align="center">
	<tr>
		<th>Sr#</th>
		<th>Item Name</th>
		<th>Item Type</th>
		<th>Item Actual Price</th>
		<th>Item Saling Price</th>
		<th>Item Quantity</th>
	</tr>
<?php   $ite = 0;
	$sel ="SELECT * from item";
	$ex_sel = mysqli_query($con,$sel) or die(mysqli_error($con));
	while($row = mysqli_fetch_array($ex_sel)){
		$item_id = $row['item_id'];
		$p_name = $row['item_name'];
		$p_price = $row['item_price'];
		$p_sprice = $row['item_sprice'];
		$p_type = $row['item_type'];
		$p_q = $row['item_q'];
?>
	<tr>
		<td><input type="checkbox" value="<?php echo $item_id;?>||<?php echo $item_id;?>
            ||<?php echo $p_sprice;?>" name="pro[]"></td>
		<td><?php echo $p_name ?></td>
		<td><?php echo $p_type ?></td>
		<td><?php echo $p_price ?></td>
		<td><?php echo $p_sprice ?></td>
		<td><input type="text" name="qty<?php echo $item_id ?>" placeholder="enter item quantity" class="q_but"></td>
	</tr>
<?php
	$ite++;}
?>
</table>
        <div id="person">
            <input type="text" placeholder="enter customer" name="cus_name" class="buy_but"><br>
            <input type="submit" value="Buy product" class="buy_but">
        </div>

    </form>
<?php
	include 'footer.php';
 ?>