<?php 
		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Database.php'); 
		include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	
Class Product{
	
		private $db;
		private $fm;


		public function __construct(){
			
			$this->db = new Database();
			$this->fm = new Format();
		}



		public function productInsert($data,$file){


			$productName 	= $this->fm->validation($data['productName']);
			$catId 			= $this->fm->validation($data['catId']);				
			$brandId 		= $this->fm->validation($data['brandId']);
			$body 			= $this->fm->validation($data['body']);
			$price 			= $this->fm->validation($data['price']);
			$type 			= $this->fm->validation($data['type']);


			$productName 	= mysqli_real_escape_string($this->db->link, $data['productName']);
			$catId 			= mysqli_real_escape_string($this->db->link, $data['catId']);
			$brandId 		= mysqli_real_escape_string($this->db->link, $data['brandId']);
			$body 			= mysqli_real_escape_string($this->db->link, $data['body']);
			$price 			= mysqli_real_escape_string($this->db->link, $data['price']);				
			$type 			= mysqli_real_escape_string($this->db->link, $data['type']);

			/*imgame validation starts here*/
			
		    $permited  		= array('jpg', 'jpeg', 'png', 'gif');
		    $file_name 		= $_FILES['image']['name'];
		    $file_size 		= $_FILES['image']['size'];
		    $file_temp 		= $_FILES['image']['tmp_name'];

		    $div 			= explode('.', $file_name);
		    $file_ext 		= strtolower(end($div));
		    $unique_image 	= substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;


			/*image validation ends here*/


			if ( $productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" ) {
				
				$msg	= "<span class= 'error'> Field must not be empty ! </span>";
				return $msg;

			}elseif ($file_size >1048567) {
		     	echo "<span class='error'>Image Size should be less then 1MB!</span>";

		    }elseif (in_array($file_ext, $permited) === false) {
		     	echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";

		    } else{

					move_uploaded_file($file_temp, $uploaded_image);


					$query = " INSERT INTO 
							tbl_product(productName,catId,brandId,body,price,image,type) 
							VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

						$productInsert = $this->db->insert($query);

						if ($productInsert) {
							$msg	= "<span class= 'success'> Product Inserted Successfully. </span>" ;
							return $msg;
						}else{
							$msg	= "<span class= 'error'> Product Not Inserted. </span>" ;
							return $msg;
						}

					
				}

			
		}


		public function getAllProduct(){

			$query	= " SELECT p.*, c.catName, b.brandName

			FROM tbl_product as p, tbl_category as c, tbl_brand as b

			WHERE p.catId = c.catId AND p.brandId = b.brandID	


			ORDER BY p.productId DESC";
			

			$result = $this->db->select($query);
			return $result;

		}


		public function getProductById($id){

			$query	= " SELECT * FROM 	tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query);
			return $result;

		}



		public function productUpdate($data,$file,$id){

			$productName 	= $this->fm->validation($data['productName']);
			$catId 			= $this->fm->validation($data['catId']);				
			$brandId 		= $this->fm->validation($data['brandId']);
			$body 			= $this->fm->validation($data['body']);
			$price 			= $this->fm->validation($data['price']);
			$type 			= $this->fm->validation($data['type']);


			$productName 	= mysqli_real_escape_string($this->db->link, $data['productName']);
			$catId 			= mysqli_real_escape_string($this->db->link, $data['catId']);
			$brandId 		= mysqli_real_escape_string($this->db->link, $data['brandId']);
			$body 			= mysqli_real_escape_string($this->db->link, $data['body']);
			$price 			= mysqli_real_escape_string($this->db->link, $data['price']);				
			$type 			= mysqli_real_escape_string($this->db->link, $data['type']);

			/*imgame validation starts here*/
			
		    $permited  		= array('jpg', 'jpeg', 'png', 'gif');
		    $file_name 		= $_FILES['image']['name'];
		    $file_size 		= $_FILES['image']['size'];
		    $file_temp 		= $_FILES['image']['tmp_name'];

		    $div 			= explode('.', $file_name);
		    $file_ext 		= strtolower(end($div));
		    $unique_image 	= substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;


			/*image validation ends here*/


			if ( $productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" ) {
				
				$msg	= "<span class= 'error'> Field must not be empty ! </span>";
				return $msg;

			}else{

					if ($file_size >1048567) {
			     	echo "<span class='error'>Image Size should be less then 1MB!</span>";

			    	} 	else if (!empty($file_name)) {

				    		if (in_array($file_ext, $permited) === false){
					     			echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
					    	}	else{

						    			move_uploaded_file($file_temp, $uploaded_image);


										$query = " INSERT INTO 
										tbl_product(productName,catId,brandId,body,price,image,type) 
										VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

										$query = " UPDATE tbl_product
													SET 
													productName = '$productName',
													catId 		= '$catId',
													brandId 	= '$brandId',
													body 		= '$productName',
													price 		= '$price',
													image 		= '$uploaded_image',
													type 		= '$type'
												WHERE productID = '$id'	
												";

										$productUpdate = $this->db->update($query);

										if ($productUpdate) {
											$msg	= "<span class= 'success'> Product Updated Successfully. </span>" ;
											return $msg;
										}else{
											$msg	= "<span class= 'error'> Product Not Updated. </span>" ;
											return $msg;
										}

					    		}
				    			

			    		} else{

				    		$query = " INSERT INTO 
							tbl_product(productName,catId,brandId,body,price,type) 
							VALUES('$productName','$catId','$brandId','$body','$price','$type')";

							$query = " UPDATE tbl_product
										SET 
										productName = '$productName',
										catId 		= '$catId',
										brandId 	= '$brandId',
										body 		= '$productName',
										price 		= '$price',
										type 		= '$type'
									WHERE productID = '$id'	
									";

							$productUpdate = $this->db->update($query);

							if ($productUpdate) {
								$msg	= "<span class= 'success'> Product Updated Successfully. </span>" ;
								return $msg;
							}else{
								$msg	= "<span class= 'error'> Product Not Updated. </span>" ;
								return $msg;
							}
			    		}


				}


		}



		public function delproductById($id){

			$query = " DELETE FROM tbl_product WHERE productID = '$id' ";
			
			$deldata = $this->db->delete($query);
			
				if ($deldata) {
					$msg	= "<span class= 'success'> Product Deleted Successfully. </span>" ;
					return $msg;
				}else{
					$msg	= "<span class= 'error'> Product Not Deleted !. </span>" ;
					return $msg;
			}

		}



		public function getFeaturedProduct(){

			$query	= " SELECT * FROM 	tbl_product WHERE type = '0' ORDER BY productId DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}


		public function getNewProduct(){

			$query	= " SELECT * FROM 	tbl_product ORDER BY productId DESC LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getSingleProduct($id){

			$query	= " SELECT p.*, c.catName, b.brandName

						FROM tbl_product as p, tbl_category as c, tbl_brand as b

						WHERE p.catId = c.catId AND p.brandId = b.brandID AND p.productId = $id


						";
			

			$result = $this->db->select($query);
			return $result;

		}


		public function getNewAsus(){

			$query	= " SELECT * FROM tbl_product WHERE brandId = '8' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}


		public function getNewSamsung(){

			$query	= " SELECT * FROM 	tbl_product WHERE brandId = '2' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}


		public function getNewNikon(){

			$query	= " SELECT * FROM 	tbl_product WHERE brandId = '16' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}


		public function getNewCanon(){

			$query	= " SELECT * FROM 	tbl_product WHERE brandId = '15' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}



}


?>