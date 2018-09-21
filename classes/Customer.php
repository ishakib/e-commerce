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
			$address 	= $this->fm->validation($data['address']);
			$city 		= $this->fm->validation($data['city']);
			$country 	= $this->fm->validation($data['country']);
			$zipcode 	= $this->fm->validation($data['zipcode']);
			$phone 		= $this->fm->validation($data['phone']);
			$email 		= $this->fm->validation($data['email']);
			$password 	= $this->fm->validation($data['password']);

			$name 		= mysqli_real_escape_string($this->db->link,$data['name']);
			$address 	= mysqli_real_escape_string($this->db->link,$data['address']);
			$city 		= mysqli_real_escape_string($this->db->link,$data['city']);
			$country 	= mysqli_real_escape_string($this->db->link,$data['country']);
			$zipcode 	= mysqli_real_escape_string($this->db->link,$data['zipcode']);
			$phone 		= mysqli_real_escape_string($this->db->link,md5($data['phone']));
			$email 		= mysqli_real_escape_string($this->db->link,md5($data['email']));
			$password 	= mysqli_real_escape_string($this->db->link,md5($data['password']));

			$chkmailqry  = "SELECT * FROM tbl_customer WHERE email = '$email' ";
			$chkmail 	 = $this->db->select($chkmailqry);
			$chkphoneqry = "SELECT * FROM tbl_customer WHERE phone = '$phone' ";
			$chkphone	 = $this->db->select($chkphoneqry);

		
			if ($name == "" || $address == "" || $city == "" || $country == "" || $zipcode == "" || $phone == "" || $email == "" || $password == "") {

				$msg = "<span class = 'error'>Field Must Not Be Empty</span>";
				return $msg;

			}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  				$msg = "Invalid email format";
  				return $msg; 
			}elseif ($chkmail != false) {
				$msg = "<span class = 'error'>Email already exists!</span>";
				return $msg;

			}elseif ($chkphone != false) {
				$msg = "<span class = 'error'>Phone number already exists!</span>";
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

