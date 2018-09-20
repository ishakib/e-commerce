<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">

					<?php
						$getdata = $pd->getNewAsus();
						if ($getdata) {
							while ($result = $getdata->fetch_assoc()) {
					?>
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image'] ; ?>" alt="" /></a>
					</div>

				    <div class="text list_2_of_1">
						<h2>Asus</h2>
						<p> <?php echo $result['productName'] ; ?> </p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
				 <?php } }  ?>
			   </div>

				<div class="listview_1_of_2 images_1_of_2">

				   	<?php
							$getdata = $pd->getNewSamsung();
							if ($getdata) {
								while ($result = $getdata->fetch_assoc()) {
					?>
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image'] ; ?>" alt="" /></a>
					</div>

				    <div class="text list_2_of_1">
						<h2>Sumsung</h2>
						<p> <?php echo $result['productName'] ; ?> </p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
				<?php } }  ?>

				</div>			
			</div>



			<div class="section group">

				<div class="listview_1_of_2 images_1_of_2">
					   	<?php
							$getdata = $pd->getNewNikon();
							if ($getdata) {
								while ($result = $getdata->fetch_assoc()) {
					?>
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image'] ; ?>" alt="" /></a>
					</div>

				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p> <?php echo $result['productName'] ; ?> </p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
				<?php } }  ?>
				
			   </div>			


				<div class="listview_1_of_2 images_1_of_2">
					   	<?php
							$getdata = $pd->getNewCanon();
							if ($getdata) {
								while ($result = $getdata->fetch_assoc()) {
					?>
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image'] ; ?>" alt="" /></a>
					</div>

				    <div class="text list_2_of_1">
						<h2>Canon</h2>
						<p> <?php echo $result['productName'] ; ?> </p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
				<?php } }  ?>
				
				</div>

			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	

 