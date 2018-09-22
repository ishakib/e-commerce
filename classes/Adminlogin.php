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

	public function adminlogin($adminUser,$adminPass){

		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);

		if ($adminUser == '' | $adminPass == '') {
			$loginmsg	= "User or Password must not be empty";
			return $loginmsg;
		}else{

			$query	= " SELECT * FROM tbl_admin WHERE 	adminUser = '$adminUser' AND adminPass = '$adminPass'";

			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("login",true);
				Session::set("adminId",$value['adminId']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);
				header("Location:dashboard.php"); 
			}else{
				$loginmsg	= "User and Password not matched !";
				return $loginmsg;
			}

		}

	}

}

?>