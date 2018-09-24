<?php include 'inc/header.php'; ?>
<style>
.tblone{border: 1px solid #d8f0f3;width: 65%;margin: 0 auto; font-size: 20px;}
.tblone tr td{color: #000000;padding: 15px 2px 5px 10px; text-align: justify;}
.tblone tr td p{font-size: 20px; }
</style>

<div class="main">
    <div class="content">
   	    <div class="section group">
			<table class="tblone">
	<?php 

		$id 		= Session::get('custId');
		$getdata 	= $cust->getCustomerData($id);

		if ($getdata) {
			while ($result = $getdata->fetch_assoc()) {
	?>
			<tr>
				<td colspan="3" style="text-align: center;"><h2>User Profile</h2></td>				
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
			
		
		</table>	
	<?php } } ?>					

		</div>
			
			
    </div>
 </div>
</div>



<?php include 'inc/footer.php'; ?>
