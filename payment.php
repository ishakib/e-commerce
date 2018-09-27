<?php include 'inc/header.php'; ?>

<?php
		$login = Session::get("custlogin");  
		if ($login == false) {
			header("Location:login.php");
		}
?>
<style>
.payment{ width: 650px; min-height: 250px; margin: 0 auto; text-align: center; border: 1px solid #ddd; padding: 50px;}
.payment h2{border-bottom: 1px solid #ddd; margin-bottom: 40px; padding-bottom: 10px;}
.payment a{background: #68308E none repeat scroll 0 0; border-radius: 10px; color: #fff; font-size: 50px;display: block; padding: 15px 30px; margin-bottom: 5px; }
.payment a:hover{background-color: yellow; color: #000000; border: 1px solid #000000;}
.previous a{min-height: 30px; width: 160px; margin: 5px auto 0 ; display: block; text-align: center; background: #434247; border-radius: 4px; color: #fff; font-size: 25px; padding: 5px 30px; }
</style>

<div class="main">
    <div class="content">
   	    <div class="section group">
			<div class="payment">
				<h2>Choose Payment Option</h2>

				<a href="paymentoffline.php">Offline Payment</a>
				<a href="paymentonline.php">Online Payment</a>
			</div>					
			<div class="previous">
				<a href="cart.php">Previous</a>
			</div>

		</div>
			
			
    </div>
 </div>
</div>



<?php include 'inc/footer.php'; ?>
