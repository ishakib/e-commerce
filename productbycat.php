<?php include 'inc/header.php'; ?>


<?php
	
	if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
			
			echo "<script> window.location = '404.php'; </script>" ;

		}else{

			$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid'])  ;
		} 
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from 
    		<?php
    			$getCatName = $cat->getCatNameById($id);
    			if ($getCatName) {
    				while ($result = $getCatName->fetch_assoc()) {
    					echo $result['catName'] ;
    				}
    			}
			?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      		<?php
					$getdata = $pd->getProductByCat($id);
					if ($getdata) {
					  		while ($result = $getdata->fetch_assoc() ) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['body'], $limit = 40) ;?></p>
					 <p><span class="price">BDT: <?php echo $result['price']; ?></span></p>
				     <div class="button">
				     	<span>
				     		<a href="preview.php?productid=<?php echo $result['productId'] ;?>" class="details">Details
				     		</a>
				     	</span>
				     </div>
				</div>
				<?php }} ?>
			</div>
    </div>
 </div>
</div>
   

<?php include 'inc/footer.php'; ?>
