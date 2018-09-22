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
			$password 	= $this->fm->validation($data['password']);
			
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


}

?>

