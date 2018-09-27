<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath = realpath(dirname(__FILE__));
		include_once ($filepath.'/../classes/Cart.php');   
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Date</th>
							<th>Cust. ID</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Address</th>
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
								
								<td><a href="">Pending</a></td>	
							<?php }else{ ?>
								<td><a href="">Delivered</a></td>
							<?php } ?>
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
