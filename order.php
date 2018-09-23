<?php include 'inc/header.php'; ?>

<?php
		$login = Session::get("custlogin");  
		if ($login == false) {
			header("Location:login.php");
		}
?>

<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h1>Order Page</h1>
    		</div>
    		<div class="clear"></div>
    	</div>
	    
	    <div class="section group">
				
				<h3> Order Now </h3>
				

		</div>
			
			
    </div>
 </div>
</div>



<?php include 'inc/footer.php'; ?>
