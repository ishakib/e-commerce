<?php include 'inc/header.php'; ?>

<?php
		$login = Session::get("custlogin");  
		if ($login == false) {
			header("Location:login.php");
		}
?>
<style>
.paymentmsg {width:750px;min-height:500px;margin:0 auto;}
.msg{margin-left: 80px; padding: 50px; }
.msg h4{font-size: 25px;}
.paymentmsg h1{font-size:40px;display:block;text-align: center;margin: 0 auto;text-shadow: 2px 2px #ff0000;}
.tblconfirm{ width: 500px; border: 1px solid #ddd; margin: 0 auto; margin-top: 15px;}
.tblconfirm tr td{font-size: 25px; padding: 20px;}
.tblconfirm tr td p{font-size: 10px;}
.tblconfirm tr td a{text-decoration: underline; padding: 5px;}

</style>

<div class="main">
    <div class="content">
   	    <div class="section group">				
			<div class="paymentmsg">
				<h1> Success!!!</h1>
<?php								
	$custId 	= Session::get("custId");
	$amount 	= $ct->amountPayable($custId);
	if($amount){
		$sum = 0;
		while ($result = $amount->fetch_assoc()) {							
			$sum  = $sum + $result['price'];			
		}
	}
?> 
			
				<table class="tblconfirm">
					<tr>
						<td width="40%" style="background: #4A4248; color: #fff;">Total Payable<p>(including 10% vat)</p></td>
						<td> BDT: 
									<?php 
										$vat   = $sum * 0.1;
										$total = $sum + $vat;
										echo $total; 										
									?>
									
						/=</td>
						
					</tr>
					<tr>
						<td style="background: #4A4248; color: #fff;">Order Details</td>
						<td><a href="orderdetails.php">Details</a></td>
					</tr>
					
					<tr>
						<td style="background: #4A4248; color: #fff;">Order Reciecpt</td>
						<td><a href="">Download Here</a></td>
					</tr>


					
				</table>

					<div class="msg">
						<h4 >Your Product will be delivered as soon as possible.</h4> 	
					</div >
					
				</div>

		</div>
			
			
    </div>
 </div>
</div>



<?php include 'inc/footer.php'; ?>
