<?php include 'inc/header.php'; ?>

<?php
		$login = Session::get("custlogin");  
		if ($login == false) {
			header("Location:login.php");
		}
?>
<?php
		  	$custId 	= Session::get("custId");
		  	$getData 	= $ct->reciptOrder($custId);  	
		
?>

<style>
.tblone tr th h3{font-size: 25px; font-style: oblique;}
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
	<h2 style="text-align: center; margin-bottom: 5px;">Payment Offline</h2>
				

 <?php if ($getData ){
	echo $getData ;
} ?>

	<table class="tblpayment">
	<tr>
		<td> <!-- Cart page -->
			<div class="divone"> 		
				<table class="tblone">
					<tr>
						<th colspan="5"><h3>Cart Item</h3></th>
					</tr>
						
					<tr>
						<th>No</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total Price</th>	
					</tr>

		<?php
		$getpd = $ct->getAllCartProduct();

			$totalprice = 0;
			$vat = 0;
			$subTotal = 0;
			$gTotal = 0;

		if ($getpd) {									
			$i=0;
			while ($result = $getpd->fetch_assoc()) {	
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
						
					</tr>

		<?php 
			$subTotal = $subTotal+$totalprice;
		?>
				
		<?php } } ?>	

				</table>

		<?php
		$getData = $ct->getAllCartProduct();
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
	

		<td><!-- profile page -->			

			<div class="divtwo" >
			<table class="tblone">	
		<?php 

		$id 		= Session::get('custId');
		$getdata 	= $cust->getCustomerData($id);

		if ($getdata) {
			while ($result = $getdata->fetch_assoc()) {
		?>			
				<tr>
					<th colspan="3"><h3>User Profile</h3></th>				
				</tr>
				<tr>
					<td width="15%">Name</td>
					<td width="5%">:</td>
					<td><p><?php echo $result['name']; ?> </p></td>				
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td> <p><?php echo $result['city']; ?></p></td>				
				</tr>
				<tr>
					<td>Zipcode</td>
					<td>:</td>
					<td> <p><?php echo $result['zipcode']; ?> </p></td>				
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><p><?php echo $result['email']; ?></p></td>				
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><p><?php echo $result['address']; ?></p></td>				
				</tr>
				<tr>
					<td>Country</td>
					<td>:</td>
					<td><p><?php echo $result['country']; ?></p></td>				
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><p><?php echo $result['phone']; ?></p></td>				
				</tr>
				<tr>
					<td colspan="3" class="buttonedit" style="text-align: center;">
						<button style=" padding: 8px;" >
							<a style="font-size: 20px;" href="updateprofile.php">Edit Profile</a>
						</button>
					</td>
					 				
				</tr>
				
				<?php } } ?>
			</table>	
			</div>

		</td>
						
	</tr>

	</table>

					

</div> 	<!-- Section Group -->					
</div>	<!-- Content -->
</div>	<!-- Main -->


<?php include 'inc/footer.php'; ?>
