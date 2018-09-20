<?php include 'inc/header.php'; ?>

<?php  	
	if(isset($_GET['delcart'])){
		$id 		= $_GET['delcart'];		
		$delCart 	= $ct->delCartrById($id);
	}
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$cartId 		= $_POST['cartId'];
			$quantity 		= $_POST['quantity'];
			$updateCartQty 	= $ct->updateCartQty($cartId, $quantity);
		}	 
?>

<?php
		if (!isset($_GET['id'])) {
			echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
		  }  
?>


<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>

            <?php  
            	
            	if(isset($updateCartQty)){
            		echo $updateCartQty; 
            	}
            ?>
            <?php	
            	if(isset($delCart)){
            		echo $delCart; 
            	}

            ?>  
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="25%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="10%">Total Price</th>
								<th width="10%">Action</th>
							</tr>

							<?php
								$getpd = $ct->getAllCartProduct();

									$totalprice = 0;
									$vat = 0;
									$subTotal = 0;
									$gTotal = 0;

								if ($getpd) {									
									$i=0;
									while ($result = $getpd->fetch_assoc()) {	
										$i++;
										
							 ?>	
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>BDT: <?php echo $result['price']; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>										

										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>BDT: <?php 
												$totalprice = $result['price']*$result['quantity'];

												echo $totalprice; 
										 ?>
										 	
								</td>
								<td><a onclick ="return confirm('Are you sure to delete!')" href="?delcart=<?php echo $result['cartId'];?>">X</a></td>
							</tr>

							<?php 
									$subTotal = $subTotal+$totalprice;

							?>
							
						<?php } } ?>	

						</table>
						<?php
							$getData = $ct->getAllCartProduct();
							if ($getData) {
						?>

						<table class="tbltwo">
							<tr>
								<th>Sub Total : </th>
								<td>BDT: <?php echo $subTotal; ?> /=</td>
							</tr>
							<tr>
								<th>VAT 10% :</th>
								<td>BDT: <?php 
											$vat = $subTotal*0.1;
											echo $vat;
										?>
								/=</td>
							</tr>
							<tr style="background: #000000;color: #fff;font-size: 20px;">
								<th>Grand Total :</th>
								<td>BDT:
									<?php 
											$gTotal = $subTotal+$vat;
											echo $gTotal;
											Session::set("gTotal",$gTotal);
									?>
								/=</td>
							</tr>


					   </table>
					<?php }else{
								header("Location:index.php");
					} ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.html"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.html"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php'; ?>