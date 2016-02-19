<?php include ('components/head_section.php'); ?>
<?php include ('components/body_header.php'); ?>
<section>
	<div class="container">
		<div class="row">
			<?php include ('left_side_bar_ads_only.php'); ?>
			<div class="col-sm-9">
				<div class="blog-post-area">
					
					
					<?php

					$blog = $blog_s[0];
					//foreach($blog_s as $blog){?>
					<div class="single-blog-post">
						<h2><?php echo $blog->Heading?></h2>
						<div class="post-meta">
							<ul>
								<li><i class="fa fa-user"></i> Adora Admin</li>
								<li><i class="fa fa-clock-o"></i> <?php echo substr( $blog->Date,10)?></li>
								<li><i class="fa fa-calendar"></i> <?php echo substr( $blog->Date, 0, 10)?></li>
							</ul>
							<span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</span>
						</div>
						<a href="">
							<?php echo '<img src="'.$blog->imageLink.'" height="60%" width="40%"/>';?>
							
						</a>
						<p><?php echo $blog->Content; ?></p>
						<hr/>
						<?php if(isset($_SESSION['Username'])){?>
						<h4>Add a comment</h4>

					<form action="<?php echo base_url();?>Welcome/add_review_blog/<?php echo $blog->Article_ID;?>" method="post">
						<textarea name="comment" class="form-control" height="800" required="required"> <?php if(isset($blog_comment_back)){ echo $blog_comment_back;}?></textarea>
						</br>
						<button type="submit" class="btn btn-default pull-right" onclick="getwords('id')">
							Submit
						</button>
						</br>
					</form>
					<?php } else{ echo "<h5> Login to comment.</h5>"; } ?>
						
					</div>
					<hr/>
					</br>
					

					<div class="tab-pane fade active in" id="reviews" >
								 

								<div class="col-sm-12">
									<h5>Comments</h5>
									<?php foreach($blog_review as $review){?>
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?php echo $review->user_name?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo substr($review->time,10)?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo substr($review->time,0,10)?></a></li>
										<?php if(isset($_SESSION['Username'])){ ?>
											<? if(strcmp($_SESSION['Username'], $review->user_name)==0){?>
										<li><a class="cart_quantity_delete" href="<?php echo base_url()."Welcome/delete_review/".$review->id."/".$blog_s[0]->Article_ID; ?>"><i class="fa fa-times"></i></a></li>
										<?php }}?>
									</ul>
									<?php echo $review->comment?>
									<hr/>
								<?php }?> 
								</div>

							</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include ('components/footer.php'); ?>
<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>