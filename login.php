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

    		<form action="" method="post">
		   		<table>
	   				<tbody>
					<tr>
					<td>
						<div>
							<input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" />
						</div>
						
						<div>
							<input type="text" name="city" value="City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}"/>
						</div>
						
						<div>
							<input type="text" name="zipcode" value="Zipcode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Zipcode';}"/>
						</div>
						<div>
							<input type="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
						</div>
	    			 </td>
	    			<td>
						<div>
							<input type="text" name="address" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" />
						</div>
		    			<div>
							<input type="text" name="country" value="Country" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Country';}"/>
						</div>		        
		
			           	<div>
			         		<input type="text" name="phone" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"/>
			          	</div>
					  
					  	<div>
							<input type="text" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"/>
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
