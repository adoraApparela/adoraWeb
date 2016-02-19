	
	<section>
		<div class="container">
			<div class="row">
				<?php include ('components/left_side_bar.php'); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php echo '<img src="'.$item_details[0]->imageLink.'" id="img" />';  ?>
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<?php 
								$count = 0;
								$count1 = 0;

								foreach($images as $item){
									$count ++;
								}?>
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								    	<?php if($count<4) { ?>
										<div class="item active">
										  <?php for ($x = 0; $x < count($images); $x=$x+3) { ?>
										  	<a  href="javascript:void(0);" onclick="changeImage('<?php echo $images[$x]->imageLink ?>');"><?php echo '<img src="'.$images[$x]->imageLink.'" width="80px"/>';  ?></a>
										  	<?php $count1++; ?>
										  	<?php if($count1 < $count) { ?>
										  		<a  href="javascript:void(0);" onclick="changeImage('<?php echo $images[$x+1]->imageLink ?>');"><?php echo '<img src="'.$images[$x+1]->imageLink.'" width="80px"/>';  ?></a>
										  	<?php } $count1++; if($count1 < $count) { ?>
										  		<a  href="javascript:void(0);" onclick="changeImage('<?php echo $images[$x+2]->imageLink ?>');"><?php echo '<img src="'.$images[$x+2]->imageLink.'" width="80px"/>';  ?></a>
										  	<?php } $count1++; ?>
										  	<?php if($count1 < $count) { ?>
										  		</div>
										  		<div class="item">
										  	<?php } ?>
										  <?php } ?>
										</div>
										<?php } ?>

										<?php if($count>3) { ?>
										<div class="item active">
										  <?php for ($x = 0; $x < count($images); $x=$x+3) { ?>
										  	<a  href="javascript:void(0);" onclick="changeImage('<?php echo $images[$x]->imageLink ?>');"><?php echo '<img src="'.$images[$x]->imageLink.'" width="80px"/>';  ?></a>
										  	<?php $count1++; ?>
										  	<?php if($count1 < $count) { ?>
										  		<a  href="javascript:void(0);" onclick="changeImage('<?php echo $images[$x+1]->imageLink ?>');"><?php echo '<img src="'.$images[$x+1]->imageLink.'" width="80px"/>';  ?></a>
										  	<?php } $count1++; if($count1 < $count) { ?>
										  		<a  href="javascript:void(0);" onclick="changeImage('<?php echo $images[$x+2]->imageLink ?>');"><?php echo '<img src="'.$images[$x+2]->imageLink.'" width="80px"/>';  ?></a>
										  	<?php } $count1++; ?>
										  	<?php if($count1 < $count) { ?>
										  		</div>
										  		<div class="item">
										  	<?php } ?>
										  <?php } ?>
										</div>
										<?php } ?>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $item_details[0]->Name?></h2>
								<p><?php echo $item_details[0]->Description?></p>
								<img src="/images/product-details/rating.png" alt="" />
								<?php $Availability = $item_details[0]->Medium_Quantity;
									if($Availability >0) {
								?>
								<form id="addtoCart-form" class="contact-form row" action="<?php echo site_url('welcome/add_to_cart/'.$item_details[0]->Item_ID.'/'.$item_details[0]->Price); ?>" name="contact-form" method="post">
									
								<span>
									<span>RS:&nbsp<?php echo $item_details[0]->Price?></span>
									<label>Quantity:</label>
									
									<input type="number" size="50" required="required" name="qty" /></br>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								
								
								</span>
								</form>
								<?php } ?>

								<?php $Availability = $item_details[0]->Medium_Quantity;
									if($Availability >0) {
								?>
								<p><b>Availability:</b> In Stock</p>
								<?php } 
									else { ?>
									<p><b>Availability:</b> Out of Stocks</p>
								<?php } ?>

								<p><b>Available Qty:</b> <?php echo $item_details[0]->Medium_Quantity?></p>

								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> Adora</p>
								<a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								 <?php foreach($reviews as $review){?>

								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?php echo $review->Name?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo $review->Time?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo $review->Date?></a></li>
									</ul>
									<p><?php echo $review->Comment?></p>
									<hr>
								<?php }?> 
								<p><b>Write Your Review</b></p>
									
									<form action="<?php echo base_url();?>welcome/add_review/<?php echo $item_details[0]->Item_ID?>" method="post">
										<span>
										<div class="form-group col-md-12">
											<input type="text" name="name" class="form-control" required="required" placeholder="Your Name"/>
										</div>
										<div class="form-group col-md-12">
											<input type="email" name="email" class="form-control" required="required" placeholder="Email Address"/>
										</div>
										</span>
										<textarea name="comment" class="form-control" required="required" ></textarea>
										<b>Rating: </b> <img src="/images/product-details/rating.png" alt="" />
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>

							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
				</div>
			</div>
		</div>
	</section>
	
	<script type="text/javascript">
        function changeImage(a) {
            document.getElementById("img").src=a;
        }
	</script>
    <script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.scrollUp.min.js"></script>
	<script src="/js/price-range.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>