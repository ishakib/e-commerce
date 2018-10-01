<?php 
		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Session.php');
		Session::checkLogin();
		include_once ($filepath.'/../lib/Database.php'); 
		include_once ($filepath.'/../helpers/Format.php');
?>

<?php  

Class Adminlogin{
	
	private $db;
	private $fm;


	public function __construct(){
		
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminLogin($data){

		$adminUser = $this->fm->validation($data['adminUser']);
		$adminPass = $this->fm->validation(md5($data['adminPass']));

		if ($adminUser == "" || $adminPass == "" ) {
				$msg	= "User or Password must not be empty!";
				return $msg;
		}else{
			
				$query	= " SELECT * FROM tbl_admin WHERE 	adminUser = '$adminUser' AND adminPass = '$adminPass'";

				$result = $this->db->select($query);
				
			if ($result != false) {
				$value = $result->fetch_assoc();			
				Session::set("adminlogin",true);
				Session::set("adminId",$value['adminId']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);			
				header("Location:dashboard.php"); 

			}else{
				$msg	= "User and Password not matched !";
				return $msg;
			}
		}



	}


	



}

?>