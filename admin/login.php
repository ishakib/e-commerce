<?php include '../classes/Adminlogin.php';?>

<?php  
 		$al = new Adminlogin();

 		if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD']) {   
	         $loginChk  = $al->adminLogin($_POST);
	    }


		/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
		        
		        $adminUser = $_POST['adminUser'];
		        $adminPass = md5($_POST['adminPass']);

		        $loginChk  = $al->adminLogin($adminUser,$adminPass);
	    }*/
?>
	
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>

<style>
.buttons{}
.buttons button{ width: 70px; min-height: 40px; font-size: 20px;} 
</style>	
<div class="container">
	<section id="content">
		<form action="login.php" method="post">

			<h1>Admin Login</h1>

			<span style="color: red; font-size: 18px;">
				
				<?php
						if (isset($loginChk)) {
							echo $loginChk;	
						}
				 ?>

			</span>

			<div>
				<input type="text" placeholder="Username" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="adminPass"/>
			</div>
			<div class="buttons"><div><button class="grey" name= "login">Login</button></div></div>
			
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>