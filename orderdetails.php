<?php include 'inc/header.php'; ?>

<?php
		$login = Session::get("custlogin");  
		if ($login == false) {
			header("Location:login.php");
		}
?>


<style>
.tblone tr th{text-align: justify;}
.tblone tr th h3{font-size: 25px; font-style: oblique; text-align: center;}
.tblpayment{ width: 100%; border: 1px solid #ddd;}
.tblpayment tr{padding: 8px;border: 1px solid #ddd; }
.tblpayment tr td{text-align: justify;padding: 8px; }
.button{ display: block; margin: 10px auto; background: #FFD700; border-radius: 25px; }
.button a{ padding: 8px ;font-size: 40px; display: block;color: #000; }
.button a:hover{border-radius: 25px; padding: 8px ;font-size: 40px; display: block;color: #FFD700; background: #000;}
</style>

<div class="main">
<div class="content">
<div class="section group">
	<h2 style="text-align: center; margin-bottom: 5px;">Order Details</h2>
				

	<table class="tblpayment">
	<tr>
		<td> <!-- Cart page -->
			<div class="divone"> 		
				<table class="tblone">
					<tr>
						<th colspan="8"><h3>Cart Item</h3></th>
					</tr>
						
					<tr>
						<th>No</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total Price</th>
						<th>Order Date</th>
						<th>Status</th>
						<th>Action</th>	
					</tr>

		<?php
			$custId 	= Session::get("custId");
		  	$getData 	= $ct->reciptOrder($custId);

			$totalprice = 0;
			$vat = 0;
			$subTotal = 0;
			$gTotal = 0;

		if ($getData) {									
			$i=0;
			while ($result = $getData->fetch_assoc()) {	
				$i++;			
		?>	
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $result['productName']; ?></td>				
						<td>BDT: <?php echo $result['price']; ?></td>
						<td><?php echo $result['quantity']; ?></td>
						<td>BDT: <?php 
									$totalprice = $result['price']*$result['quantity'];
									echo $totalprice; 
								 ?>							 	
						</td>
						<td><?php echo $fm->formatDate($result['date']) ; ?></td>

						<?php
							if ($result['status'] == 'pending') {
						?>
							<td>Pending</td>
						<?php }else{ ?>
							<td>Delivered</td>
						<?php } ?>	
						

						<?php
							if ($result['status'] == 'pending') {
						?>	
						<td>N/A</td>  	
						<?php }else{ ?>
						<td>Delivered</td>	
						<?php } ?>
						
						
					</tr>

		<?php 
			$subTotal = $subTotal+$totalprice;
		?>
				
		<?php } } ?>	

				</table>

		<?php
		
		$custId 	= Session::get("custId");
		$getData 	= $ct->amountPayable($custId);
		if ($getData) {
		?>

				<table class="tbltwo">
					<tr>
						<td>Sub Total : </td>
						<td>BDT: <?php echo $subTotal; ?> /=</td>
					</tr>
					<tr>
						<td>VAT 10% :</td>
						<td>BDT: <?php 
									$vat = $subTotal*0.1;
									echo $vat;
								?>
						/=</td>
					</tr>
					<tr style="background: #000000;color: #fff;font-size: 20px;">
						<th>Grand Total :</th>
						<td>BDT:
							<?php 
									$gTotal = $subTotal+$vat;
									echo $gTotal;
									Session::set("gTotal",$gTotal);
							?>
						/=</td>
					</tr>


				</table>
		<?php } ?>
					
				
			</div>			
		</td>
	
						
	</tr>

	</table>

					

</div> 	<!-- Section Group -->					
</div>	<!-- Content -->
</div>	<!-- Main -->


<?php include 'inc/footer.php'; ?>
