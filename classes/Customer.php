<?php 
		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Database.php'); 
		include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	
Class Customer{
	
		private $db;
		private $fm;

		public function __construct(){
			
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function customerRegistration($data){

			$name 		= $this->fm->validation($data['name']);
			$city 		= $this->fm->validation($data['city']);
			$zipcode 	= $this->fm->validation($data['zipcode']);
			$email 		= $this->fm->validation($data['email']);
			$address 	= $this->fm->validation($data['address']);
			$country 	= $this->fm->validation($data['country']);
			$phone 		= $this->fm->validation($data['phone']);						
			$password 	= $this->fm->validation(md5($data['password']));
			
			$phone 		= $this->fm->phonevalidation($data['phone']);

			//unique Email check
			$chkmailqry  = "SELECT * FROM tbl_customer WHERE email = '$email' ";
			$chkmail 	 = $this->db->select($chkmailqry);

			//Cheking the phone number to be unique
			$chkphoneqry = "SELECT * FROM tbl_customer WHERE phone = '$phone' ";
			$chkphone	 = $this->db->select($chkphoneqry);

	
			if ($name == "" || $address == "" || $city == "" || $country == "" || $zipcode == "" || $phone == "" || $email == "" || $password == "") {

				$msg = "<span class = 'error'>Field Must Not Be Empty</span>";
				return $msg;

			}elseif ($chkmail != false) {
				$msg = "<span class = 'error'> Email: $email already exist!</span>";
				return $msg;

			}elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$msg = "<span class = 'error'>Invalid email format!</span>";
				return $msg;
			}elseif ($chkphone != false) {
				$msg = "<span class = 'error'> Phone: $phone already exist!</span>";
				return $msg;
			
			}elseif (strlen($phone) > 10) {
				$msg = "<span class = 'error'>Invalid Phone number!</span>";
				return $msg;
			
			}else{
			 
					$query = " INSERT INTO 
					tbl_customer(name, address, city, country, zipcode, phone, email, password) 
					VALUES('$name','$address','$city','$country','$zipcode','$phone','$email','$password')";

					$customerInsert = $this->db->insert($query);

					if ($customerInsert) {
						$msg	= "<span class= 'success'> Registration Successfull. </span>" ;
						return $msg;
					}else{
						$msg	= "<span class= 'error'> Registration Incomplete. </span>" ;
						return $msg;
					}
									
			}			

		}


		public function customerLogin($data){
			$email 		= $this->fm->validation($data['email']);
			$password 	= $this->fm->validation(md5($data['password']));

			if (empty($email) || empty($password )) {
				$msg	= "<span class= 'error'> Field must not be empty! </span>" ;
						return $msg;
			}elseif (filter_var($email, FILTER_VALIDATE_EMAIL) != false){
				$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'";
				$result = $this->db->select($query);

				if ($result != false) {
					$value = $result->fetch_assoc();
					Session::set("custlogin",true);
					Session::set("custId",$value['customerId']);
					Session::set("custName",$value['name']);
					Session::set("custPhone",$value['phone']);
					header("Location:index.php");
				}else{
					$msg	= "<span class= 'error'> Email or Password not matched! </span>" ;
					return $msg;
				}
			}elseif (is_numeric($data['email'])) {
				
			
				$phone 		= $this->fm->phonevalidation($data['email']);
				$query = "SELECT * FROM tbl_customer WHERE phone = '$phone' AND password = '$password'";
				$result = $this->db->select($query);

				if ($result != false) {
					$value = $result->fetch_assoc();
					Session::set("custlogin",true);
					Session::set("custId",$value['customerId']);
					Session::set("custName",$value['name']);
					Session::set("custPhone",$value['phone']);
					header("Location:index.php");
				}
				else{
					$msg	= "<span class= 'error'> Phonne Number or Password not matched! </span>" ;
					return $msg;
				}	
			}else{
				header("Location:404.php");
			}
		}


		public function getCustomerData($id){
			$query	= " SELECT * FROM tbl_customer WHERE customerId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}


		public function customerUpdate($data, $id){

			$name 		= $this->fm->validation($data['name']);
			$city 		= $this->fm->validation($data['city']);
			$zipcode 	= $this->fm->validation($data['zipcode']);
			$email 		= $this->fm->validation($data['email']);
			$address 	= $this->fm->validation($data['address']);
			$country 	= $this->fm->validation($data['country']);
			$phone 		= $this->fm->validation($data['phone']);						
			$phone 		= $this->fm->phonevalidation($data['phone']);


			if ($name == "" || $address == "" || $city == "" || $country == "" || $zipcode == "" || $phone == "" || $email == "") {

				$msg = "<span class = 'error'>Field Must Not Be Empty</span>";
				return $msg;

			}else{

					$query = " 

						UPDATE tbl_customer 
						SET 
						
						name 	= '$name',
						city 	= '$city',
						zipcode = '$zipcode',
						email 	= '$email',
						address = '$address',
						country = '$country',
						phone 	= '$phone'
						
						WHERE
						
						customerId = '$id'

					 ";

				$updated_row = $this->db->update($query);

				if ($updated_row) {
					$msg	= "<span class= 'success'> Information Updated</span>" ;
					return $msg;
				}else{
					$msg	= "<span class= 'error'> Information Not Updated </span>" ;
					return $msg;
				}
			}
		}
		


		public function chkEmailAvlbl($email){
			
			$email 	= $this->fm->validation('email');

			$query	= " SELECT * FROM tbl_customer WHERE email = '$email'";
			$result = $this->db->select($query);
			echo $result;
			
			if ($email == "") {
				echo "<span class= 'error'> Email Field Must Not Be Empty!! </span>" ;				
			}/*elseif($result == $email ) {
				echo "<span class= 'error'><b>$email</b> is not available.</span>";
			}elseif($result != $email ){
				echo "<span class= 'success'><b>$email</b> is available.</span>" ;
			}
			*/
			
		}


		public function chkPhoneAvlbl($phone){
			
			$phone 	= $this->fm->phonevalidation('phone');

			$query	= " SELECT * FROM tbl_customer WHERE phone = '$phone'";
			$result = $this->db->select($query);
			
			if ($phone == "") {
				
				echo "<span class= 'error'> Please enter your phone </span>" ;
				exit();

			}elseif ($result) {

				echo "<span class= 'error'><b>$phone</b> is not available.</span>" ;
				exit();
			
			}else{
				
				echo "<span class= 'success'><b>$phone</b> is available.</span>" ;
				exit();
			}
		}



}

?>

