<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?> 
<?php include '../classes/Category.php';?>
<?php include '../classes/Brand.php';?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
		$pd = new Product();
		$fm = new Format();

		if(isset($_GET['delpro'])){
		
			$id = $_GET['delpro'];
				
			$delpro	= $pd->delProductById($id);
		}

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Body</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php  
					
					$getpd = $pd->getAllProduct();

					if ($getpd) {
						while ($result = $getpd->fetch_assoc()) {							
				?>
				<tr class="odd gradeX">
					<th> <?php echo $result['productId']; ?> </th>
					<th> <?php echo $result['productName']; ?> </th>
					<th> <?php echo $result['catName']; ?> </th>
					<th> <?php echo $result['brandName']; ?> </th>
					<th> <?php echo $fm->textShorten($result['body'], 40) ; ?> </th>
					<th> <?php echo $result['price']; ?> /= </th>
					<th> <img src="<?php echo $result['image']; ?>" width="50px" height="40">	 </th>

					<th> 
						<?php 
							if ($result['type'] == 0) {
								echo "Featured";
							}else{
								echo "General";
							}
					
						?> 
					</th>


					<td>
						<a href="productedit.php?productid=<?php echo $result['productId'];?>">Edit</a> || 

						<a onclick ="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['productId'];?>">Delete</a>
					</td>
				</tr>			
			<?php } } ?>
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