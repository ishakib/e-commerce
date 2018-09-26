<?php include 'inc/header.php'; ?>

<?php
		$login = Session::get("custlogin");  
		if ($login == false) {
			header("Location:login.php");
		}
?>
<style>
.paymentoline{ width: 80%; min-height: 250px; background: #C7322C; text-align: center;margin: 0 auto; }
.paymentoline h1{ font-size: 50px; display: block; color: #86DC2B; padding: 75px 0;}


</style>

<div class="main">
    <div class="content">
   	    <div class="section group">
			<h2 style="text-align: center;">Payment Online</h2>
			<div class="paymentoline">
				<h1>Service Coming Soon...</h1>
			</div>

		</div>
			
			
    </div>
 </div>
</div>



<?php include 'inc/footer.php'; ?>
