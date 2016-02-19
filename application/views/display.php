<?php include ('components/head_section.php'); ?>
<?php include ('components/body_header.php'); ?>
	
	<section>
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href=<?php echo base_url(); ?>>Home</a></li>
				  <li class="active"><?php $url=current_url(); $output = end((explode('/', $url))); echo $output ?></li>
				</ol>
			</div>
			<div class="row">
				<?php include ('components/left_side_bar.php'); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Filter Results</h2>
						
     <?php 
     	if (count($Items) == 0) {
     		echo "<h3 class=\"title text-center\">Sorry! We have no such items in our store. Try another item</h3>";
     	}
     	
     		foreach($Items as $item){
     ?>
     <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<?php echo '<img src="'.$item->imageLink.'" height="100%" width="100%"/>';  ?>
											<h2>RS &nbsp<?php echo $item->Price?></h2>
											<p><?php echo $item->Name?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>RS &nbsp<?php echo $item->Price?></h2>
												<p><?php echo $item->Name?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Inquire about this</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
     <?php }?>  
   
						
						
					</div><!--features_items-->

					
				</div>
			</div>
		</div>
	</section>
	
	<?php include ('components/footer.php'); ?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>