<?php 
		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../classes/Customer.php'); 
		$cust = new Customer();
?>

<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {			
			$email 		= $_POST['email'];
			$chkemail 	= $cust->chkEmailAvlbl($email);	

		}
?>

