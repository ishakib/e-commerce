<?php 
		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Database.php'); 
		include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	
Class Category{
	
		private $db;
		private $fm;

		public function __construct(){
			
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function catInsert($catName){


				$catName = $this->fm->validation($catName);
		 
				if (empty($catName)) {
					$msg	= "<span class= 'error'> Field must not be empty ! </span>";
					return $msg;
				}else{

						$query	= "INSERT INTO tbl_category(catName) VALUES('$catName')";

						$catInsert = $this->db->insert($query);

						if ($catInsert) {
							$msg	= "<span class= 'success'> Category Inserted Successfully. </span>" ;
							return $msg;
						}else{
							$msg	= "<span class= 'error'> Category Not Inserted. </span>" ;
							return $msg;
						}
						
					}
		}


		public function getAllCategory(){

			$query	= " SELECT * FROM 	tbl_category ORDER BY catId DESC";
			$result = $this->db->select($query);
			return $result;

		}


		public function getCategoryById($id){

			$query	= " SELECT * FROM 	tbl_category WHERE catId = '$id'";
			$result = $this->db->select($query);
			return $result;

		}


		public function catUpdate($catName,$id){

			$catName 	= $this->fm->validation($catName);
			$id 		= $this->fm->validation($id);

			if(empty($catName)){
				$msg	= "<span class= 'error'> Field must not be empty ! </span>";
				return $msg;
			}else{

					$query = " 

						UPDATE tbl_category 
						SET 
						
						catName = '$catName'
						
						WHERE
						
						catID = '$id'

					 ";

				$updated_row = $this->db->update($query);

				if ($updated_row) {
					$msg	= "<span class= 'success'> Category Updatedted Successfully. </span>" ;
					return $msg;
				}else{
					$msg	= "<span class= 'error'> Category Not Updatedted !. </span>" ;
					return $msg;
				}
			}
		}


		public function delCatById($id){

			$query = " DELETE FROM tbl_category WHERE catID = '$id' ";
			$deldata = $this->db->delete($query);
			
				if ($deldata) {
					$msg	= "<span class= 'success'> Category Deleted Successfully. </span>" ;
					return $msg;
				}else{
					$msg	= "<span class= 'error'> Category Not Deleted !. </span>" ;
					return $msg;
			}

		}


		public function getCatNameById($id){

			$query	= " SELECT catName FROM tbl_category WHERE catId = '$id'";
			$result = $this->db->select($query);
			return $result;

		}


}


?>