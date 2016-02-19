<section>
		<div class="container">
			<div class="row">
			<?php include ('left_side_bar.php'); ?>
				
				<div class="col-sm-9 padding-right">
					<div id="refresh_this" class="features_items"><!--features_items-->
						<h2 class="title text-center">Latest Items</h2>
						
					     <?php foreach($latest_items as $item){?>
					     <?php include('itemBox.php'); ?>
					     <?php }?>  
   	
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
								<li><a href="#pants" data-toggle="tab">Pants</a></li>
								<li><a href="#frocks" data-toggle="tab">Frocks</a></li>
								<li><a href="#kids" data-toggle="tab">Kids</a></li>
								<li><a href="#underwear" data-toggle="tab">Underwear</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								
								<?php foreach($T_shirts as $tshirt) { ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<?php echo '<img src="'.$tshirt->imageLink.'" height="100%" width="100%"/>';  ?>
												<h2>RS &nbsp <?php echo $tshirt->Price ?></h2>
												<p><?php echo $tshirt->Name ?></p>
												<a href="<?php echo site_url('cart_c/add_to_cart/'.$tshirt->Item_ID.'/'.$tshirt->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php }?> 

							</div>
							
							<div class="tab-pane fade" id="pants" >
								<?php foreach($Pants as $pant) { ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<?php echo '<img src="'.$pant->imageLink.'" height="100%" width="100%"/>';  ?>
												<h2>RS &nbsp <?php echo $pant->Price ?></h2>
												<p><?php echo $pant->Name ?></p>
												<a href="<?php echo site_url('cart_c/add_to_cart/'.$pant->Item_ID.'/'.$pant->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php }?> 
							</div>
							
							<div class="tab-pane fade" id="frocks" >
								<?php foreach($Frocks as $frock) { ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<?php echo '<img src="'.$frock->imageLink.'" height="100%" width="100%"/>';  ?>
												<h2>RS &nbsp <?php echo $frock->Price ?></h2>
												<p><?php echo $frock->Name ?></p>
												<a href="<?php echo site_url('cart_c/add_to_cart/'.$frock->Item_ID.'/'.$frock->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php }?> 
							</div>
							
							<div class="tab-pane fade" id="kids" >
								<?php foreach($Kids as $kid) { ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<?php echo '<img src="'.$kid->imageLink.'" height="100%" width="100%"/>';  ?>
												<h2>RS &nbsp <?php echo $kid->Price ?></h2>
												<p><?php echo $kid->Name ?></p>
												<a href="<?php echo site_url('cart_c/add_to_cart/'.$kid->Item_ID.'/'.$kid->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php }?> 
							</div>
							
							<div class="tab-pane fade" id="underwear" >
								<?php foreach($Underwears as $underwear) { ?>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<?php echo '<img src="'.$underwear->imageLink.'" height="100%" width="100%"/>';  ?>
												<h2>RS &nbsp <?php echo $underwear->Price ?></h2>
												<p><?php echo $underwear->Name ?></p>
												<a href="<?php echo site_url('cart_c/add_to_cart/'.$underwear->Item_ID.'/'.$underwear->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<?php }?> 
							</div>
						</div>
					</div><!--/category-tab-->
					
					<?php 
								$count = 0;
								$count1 = 0;

								foreach($recommended_items as $item){
										$count ++;
								}
						?>
						
					<?php if($count > 0) { ?>
									
								
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							
							<div class="carousel-inner">
								
								<div class="item active">	
									<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
									<?php for ($x = 0; $x < count($recommended_items); $x=$x+3) { ?>
										
														<a  href=<?php echo ('../welcome/product_details/').$recommended_items[$x]->Item_ID;?> ><?php echo '<img src="'.$recommended_items[$x]->imageLink.'" width="20%"/>';  ?></a>
														<h2>RS:&nbsp<?php echo $recommended_items[$x]->Price; ?></h2>
														<p><?php echo $recommended_items[$x]->Name; ?></p>
														<a href="<?php echo site_url('welcome/add_to_cart/'.$recommended_items[$x]->Item_ID.'/'.$recommended_items[$x]->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div></div></div></div>
													<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
													  	<?php $count1++; ?>
													  	<?php if($count1 < $count) { ?>
													  		<a  href=<?php echo ('../welcome/product_details/').$recommended_items[$x+1]->Item_ID;?>  ><?php echo '<img src="'.$recommended_items[$x+1]->imageLink.'" width="80px"/>';  ?></a>
													  		<h2>RS:&nbsp<?php echo $recommended_items[$x+1]->Price; ?></h2>
														<p><?php echo $recommended_items[$x+1]->Name; ?></p>
														<a href="<?php echo site_url('welcome/add_to_cart/'.$recommended_items[$x+1]->Item_ID.'/'.$recommended_items[$x+1]->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
														</div></div></div></div>
													<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
													  	<?php } $count1++; if($count1 < $count) { ?>
													  		<a  href=<?php echo ('../welcome/product_details/').$recommended_items[$x+2]->Item_ID;?>  ><?php echo '<img src="'.$recommended_items[$x+2]->imageLink.'" width="80px"/>';  ?></a>
													  		<h2>RS:&nbsp<?php echo $recommended_items[$x+2]->Price; ?></h2>
														<p><?php echo $recommended_items[$x+2]->Name; ?></p>
														<a href="<?php echo site_url('welcome/add_to_cart/'.$recommended_items[$x+2]->Item_ID.'/'.$recommended_items[$x+2]->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													  	<?php } $count1++; ?>
													  	<?php if($count1 < $count) { ?>
													  		</div>
													  	</div> </div> </div></div>
													  		<div class="item">
													  			<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
													  	<?php } else { ?>
														
													</div>
													
												</div>
											</div>
										</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>

							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					<?php } ?>
				</div>
			</div>
		</div>
	</section>