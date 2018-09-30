<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../classes/Cart.php');  

		$ct = new Cart();
		$fm = new Format();
?>

<?php
	if (isset($_GET['shiftedId'])) {
		 $id 	= $_GET['shiftedId'];
		 $date 	= $_GET['time'];
		 $price = $_GET['price'];
		$shiftProduct = $ct->shiftedData($id,$date,$price);
	}
?>

<?php  
	if (isset($_GET['pendingId'])) {
	  	$id 	= $_GET['pendingId'];
		$date 	= $_GET['time'];
		$price 	= $_GET['price'];

		$pendingProduct = $ct->pendingData($id,$date,$price);
	 }  
?>

<?php  
	if (isset($_GET['delproId'])) {
	  	$id 	= $_GET['delproId'];
		$date 	= $_GET['time'];
		$price 	= $_GET['price'];

		$removeProd = $ct->removeShiftedProduct($id,$date,$price);
	 }  
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>

				<?php 
						if (isset($shiftProduct)) {
							echo $shiftProduct;
						}	
				 ?>
				<?php
						if (isset($pendingProduct)) {
							echo $pendingProduct;
						}  
				?>		
						<tr>
							<th>Id</th>
							<th>Date</th>
							<th>Cust. ID</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Address</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$ct 	 = new Cart();
						$getData = $ct->getOrderProduct();  
						if ($getData) {
							while ($result = $getData->fetch_assoc()) {
					?>	
						<tr class="odd gradeX">
							<td><?php echo $result['custId']; ?></td>
							<td><?php echo $result['date']; ?></td>
							<td><?php echo $result['custId']; ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['price']; ?></td>
							<td><a href="customer.php?custId=<?php echo $result['custId'];?>">View Details</a></td>

							
						<?php if ($result['status'] == 'pending') { ?>
							
							<td><a href="?shiftedId=<?php echo $result['custId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Pending</a></td>	
						<?php } ?>

						<?php if ($result['status'] == 'delivered'){ ?>
							<td><a href="?pendingId=<?php echo $result['custId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Delivered</a></td>
						<?php } ?>

						
					
							<td><a onclick ="return confirm('Are you sure to delete!')" href="?delproId=<?php echo $result['custId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Remove Item</a></td>	
								
							</td>
 					

						</tr>
					

					<?php } }  ?>	

					</tbody>
				</table>
               </div>
            </div>
        </div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php include 'inc/footer.php';?>
