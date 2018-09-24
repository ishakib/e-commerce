<?php include 'inc/header.php'; ?>
<style>
.tblone{border: 1px solid #d8f0f3;width: 65%;margin: 0 auto; font-size: 20px;}
.tblone tr td{color: #000000;padding: 8px 2px 5px 10px; text-align: justify;}
.tblone tr td p{font-size: 20px; }
.tblone input[type="text"]{font-size: 20px; width: 95%; padding: 5px;}
</style>

<?php
		$login = Session::get("custlogin");  
		if ($login == false) {
			header("Location:login.php");		}
?>

<?php  
	$id = Session::get("custId");
	if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']) {   
        $custupdate = $cust->customerUpdate($_POST, $id);
    }
?>

<div class="main">
    <div class="content">
    	<div class="section group">
		
	<form action="" method="post">
		
	<?php 

		$id 		= Session::get('custId');
		$getdata 	= $cust->getCustomerData($id);

		if ($getdata) {
			while ($result = $getdata->fetch_assoc()) {
	?>
		<table class="tblone">
			<?php if (isset($custupdate)) { 
				echo "<tr><td colspan='3'><h2>".$custupdate."</h2></td></tr>";
			} ?>

			<tr>
				<td colspan="3" style="text-align: center;">
		    			<h2>Update Profile</h2>	
				</td>
			</tr>


			<tr>
				<td width="15%">Name</td>
				<td width="5%">:</td>
				<td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>

			</tr>
			<tr>
				<td>City</td>
				<td>:</td>
				<td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>				
			</tr>
			<tr>
				<td>Zipcode</td>
				<td>:</td>
				<td><input type="text" name="zipcode" value="<?php echo $result['zipcode']; ?>"></td>				
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>				
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>				
			</tr>
			<tr>
				<td>Country</td>
				<td>:</td>
				<td><input type="text" name="country" value="<?php echo $result['country']; ?>"></td>				
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>				
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;">
					<input style="font-size: 20px;" type="submit" name="submit" value="Update Profile">
					<button><a style="font-size: 20px;" href="profile.php">Back to Profile</a></button>		
				</td>
			</tr>
		</table>	
	<?php } } ?>					
	</form>
		</div>
			
			
    </div>
 </div>
</div>



<?php include 'inc/footer.php'; ?>
