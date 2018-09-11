<?php 
	include 'header.php';
	include 'connection.php';
?>
<br><table id="tab" border="1" cellspacing="0px" width="500px" align="center">
	<tr>
        <?php 
            if(isset($_POST['cus_name']))
                $cus_name = $_POST['cus_name'];
        ?> 
        <th colspan="5">
            <b>Customer Name: </b><?php echo $cus_name; ?>
            <br>Shop Name : Khan Mobile Shop <br>
            Address   : Fateh Pur Kamal
        </th>
    </tr> 
    <tr>
		<th>Item Name</th>
		<th>Item Type</th>
		<th>Item Quantity</th>
		<th>Item Price</th>
        <th>Total Price</th>
	</tr>
<?php       
//print_r($_POST);
    if(isset($_POST)){
        foreach($_POST['pro'] as $pro_id){
            $proinfo=explode("||",$pro_id);
            $productid=$proinfo[0];
            //$it=$proinfo[1];
            $price=$proinfo[2];
            $qty = $_POST['qty'.$productid];
            //inserting buy product detail in sale table
            //$ins = "INSERT INTO sale values('','$productid','$cus_name','$qty','$price','now()')";
            //$ex_ins = mysqli_query($con,$ins) or die(mysqli_error($con));
            //total quantity
            @$tqty = $tqty+$qty;
            
	$sel ="SELECT item.item_q,item.item_name,item.item_type,sale.price,sale.cus_name from item
            inner join sale on item.item_id=sale.pro_id where sale.pro_id='$productid' && sale.cus_name='$cus_name'";       
	$ex_sel = mysqli_query($con,$sel) or die(mysqli_error($con));
	while($row = mysqli_fetch_array($ex_sel)){
		//$item_id = $row['item_id'];
		$p_name   = $row['item_name'];
		$price    = $row['price'];
		$cus_name = $row['cus_name'];
		$p_type   = $row['item_type'];
        $p_q      = $row['item_q'];
        //updating quantity in item table
            //$upqty = $p_q - $qty;
            //$updq = "UPDATE item set item_q='$upqty' where item_id='$productid'";
            //$ex_selq = mysqli_query($con,$updq) or die(mysqli_error($con));
?>
	<tr>
		<td><?php echo $p_name ?></td>
		<td><?php echo $p_type ?></td>
		<td><?php echo $qty ?></td>
		<td><?php echo $price; 
            $totalp = $qty*$price;
            ?></td>
        <td><?php echo $totalp;
                @$gtotal = $gtotal+$totalp;
            ?></td>
	</tr>  
<?php
    }}    
?>

    <tr>
        <td colspan="4" align="center">Grand Total </td><td> <?php echo $gtotal; ?></td>
    </tr>
</table>
    <tr>
        <td colspan="5" align="center">
            <button class="buy_but print_but" id="print" onclick="printData()">Print</button>
        </td>
    </tr>

<?php
}
	include 'footer.php';
 ?>
 <script>
    function printData()
    {
       var divToPrint=document.getElementById("tab");
       newWin= window.open('');
       newWin.document.write(divToPrint.outerHTML);
       newWin.print();
       newWin.close();
    }
</script>
