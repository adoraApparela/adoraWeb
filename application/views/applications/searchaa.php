<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Filter Results</h2>
						
     <?php 
     	if (count($data1) == 0) {
     		echo "<h3 class=\"title text-center\">Sorry! We have no such items in our store. Try another item</h3>";
     	}
     	
     		foreach($data1 as $item){
     ?>

<div class="se-pre-con"></div>
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