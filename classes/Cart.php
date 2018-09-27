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


		public function delCustomerCart(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
			$this->db->delete($query);
		}

		public function productOrder($custId){

			$sId 	 = session_id();
			$query	 = " SELECT * FROM 	tbl_cart WHERE sId = '$sId'";
			$cartPro = $this->db->select($query);

			while ($result = $cartPro->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] *$quantity;
				$image = $result['image'];

			$query = " INSERT INTO 
							tbl_order(custId,productId,productName,price,quantity,image) 
							VALUES('$custId','$productId','$productName','$price','$quantity','$image')";

						$inserted_row = $this->db->insert($query);
						
				
			}

		}
		
		public function amountPayable($custId){
			$query	 	= " SELECT price FROM	tbl_order WHERE custId= '$custId' ";
			$result 	= $this->db->select($query);				
			return $result;

		}


		public function reciptOrder($custId){

			$query	 	= " SELECT * FROM 	tbl_order WHERE custId= '$custId' ORDER BY productId DESC";
			$result 	= $this->db->select($query);
			return $result ;
		}


		public function checkOrder($custId){

			$query	 	= " SELECT * FROM 	tbl_order WHERE custId= '$custId' ORDER BY productId DESC";
			$result 	= $this->db->select($query);
			return $result ;
		}


		public function getOrderProduct(){

			$query	 	= " SELECT * FROM tbl_order ORDER BY date DESC";
			$result 	= $this->db->select($query);
			return $result ;
		}


		public function shiftedData($id,$date,$price){
			
			$id 	= $this->fm->validation($id);
			$date 	= $this->fm->validation($date);
			$price 	= $this->fm->validation($price);


			$query = " 
						UPDATE tbl_order
						SET 						
						status = 'delivered'
						
						WHERE custId = '$id' AND date = '$date' AND price = '$price' ";

			$updateCartQty = $this->db->update($query);		
			 
			if ($updateCartQty) {
					$msg	= "<span class= 'success'>Product Shifted </span>" ;
					return $msg;
				}else{
					$msg	= "<span class= 'error'>Product Shifted !. </span>" ;
					return $msg;
				}



		}



}		

?>

