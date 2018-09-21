<?php include 'inc/header.php'; ?>


 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="hello" method="get" id="member">
                	<input name="Domain" type="text" value="Username" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input name="Domain" type="password" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                 </form>
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey">Sign In</button></div></div>
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

    		<form action="login.php" method="post">
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
							<input type="text" name="email" placeholder="Email" />
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
			         		<input type="text" name="phone" placeholder="Phone number"/>
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
