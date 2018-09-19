<?php 
		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Database.php'); 
		include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	
Class Cart{
	
		private $db;
		private $fm;


		public function __construct(){
			
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function addToCart($quantity, $id){

			$sId 			= session_id();
			$quantity 		= $this->fm->validation($quantity);
			$quantity 		= mysqli_real_escape_string($this->db->link,$quantity);
			$productId 		= mysqli_real_escape_string($this->db->link,$id);
			
			$squery 		= "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$result 		= $this->db->select($squery)->fetch_assoc();
			
			$productName 	= $result['productName'];
			$price 			= $result['price'];
			$image 			= $result['image'];

			$chkquery 		= "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId' ";
			$chkduplcart 	= $this->db->select($chkquery);

			if ($chkduplcart) {
				$msg = "Product Already Added In Cart! ";
				return $msg;
			}else{

				$query = " INSERT INTO 
							tbl_cart(sId,productId,productName,price,quantity,image) 
							VALUES('$sId','$productId','$productName','$price','$quantity','$image')";

						$inserted_row = $this->db->insert($query);

						if ($inserted_row) {
							header("Location:cart.php");
						}else{
							header("Location:404.php");
						}
			}



			

		}

		public function getAllCartProduct(){

			$sId 	= session_id();
			$query	= " SELECT * FROM 	tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;

		}

		public function delCartrById($id){

			$query = " DELETE FROM tbl_cart WHERE cartID = '$id' ";
			$deldata = $this->db->delete($query);
			
				if ($deldata) {
					$msg	= "<span class= 'success'> Cart Deleted Successfully. </span>" ;
					return $msg;
				}else{
					$msg	= "<span class= 'error'> Cart Not Deleted !. </span>" ;
					return $msg;
				}

		}


		public function updateCartQty($cartId, $quantity){

			$cartId 	= $this->fm->validation($cartId);
			$quantity 	= $this->fm->validation($quantity);
			$cartId 	= mysqli_real_escape_string($this->db->link,$cartId);
			$quantity 	= mysqli_real_escape_string($this->db->link,$quantity);
			
			$query = " 
						UPDATE tbl_cart
						SET 						
						quantity = '$quantity'
						
						WHERE						
						cartId = '$cartId'
					 ";

			$updateCartQty = $this->db->update($query);		
			 
			if ($updateCartQty) {
					$msg	= "<span class= 'success'> Cart Quantity Updated. </span>" ;
					return $msg;
				}else{
					$msg	= "<span class= 'error'> Cart Quantity Not Updated. !. </span>" ;
					return $msg;
				}		 
		}


		


}

?>

