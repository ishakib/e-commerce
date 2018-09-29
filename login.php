<?php include 'inc/header.php'; ?>

<?php
		$login = Session::get("custlogin");  
		if ($login == true) {
			header("Location:index.php");
		}
?>

<?php  
		if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD']) {   
	        $custLogin = $cust->customerLogin($_POST);
	    }
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 	<?php  
    			if (isset($custLogin)) {
    				echo $custLogin;
    			}
    		?>

        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" id="member">
            	<input name="email" type="text" placeholder="Email or Phone number">
                <input name="password" type="password" placeholder="Enter your Password">
             	<div class="buttons"><div><button class="grey" name= "login">Login</button></div></div>
            </form>
        </div>

<?php  

	if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD']) {   
        $custReg = $cust->customerRegistration($_POST);
    }

?>
	
	

 	<div class="register_account">
    		<?php  
    			if (isset($custReg)) {
    				echo $custReg;
    			}
    		?>
    		<h3>Register New Account</h3>
    			<div id="emailcheck"></div>

    		<form action="" method="post">

    				

		   		<table>
	   				<tbody>
					<tr>
					<td>
						<div>
							<input type="text" name="name" placeholder="Name" />
						</div>
						
						<div>
							<input type="text" name="city" placeholder="City"/>
						</div>
						
						<div>
							<input type="text" name="zipcode" placeholder="Zipcode"/>
						</div>
 						
						<div>
							<input type="text" name="email" id="email" placeholder="Enter Your Email" />
							<div id="emailcheck"></div>
						</div>
	    			 </td>
	    			

	    			 <td>
						<div>
							<input type="text" name="address" placeholder="Address"/>
						</div>
		    			<div>
							<input type="text" name="country" placeholder="Country"/>
						</div>		        
		
			           	<div>
			         		<input type="text" name="phone" id="phone" placeholder="Phone number"/>
			          		<div id="phonecheck"></div>
			          	</div>
					  
					  	<div>
							<input type="text" name="password" placeholder="Password"/>
						</div>
		    		</td>
		    </tr> 
		    </tbody></table> 
		 
		   		<div class="buttons"><div><button class="grey" name="register">Create Account</button></div></div>
            </div>		  
                       
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>




<?php include 'inc/footer.php'; ?>
