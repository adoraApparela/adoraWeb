<?php include ('components/head_section.php'); ?>
<?php include ('components/body_header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<?php include ('left_side_bar_ads_only.php'); ?>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Latest From our Blog</h2>
					
					<?php foreach($blog_details as $blog){?>
					<div class="single-blog-post">
						<h3><?php echo $blog->Heading?></h3>
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
							<?php echo '<img src="'.$blog->imageLink.'" height="60%" width="40%"/>';  ?>
							
						</a>
						<p><?php echo substr($blog->Content, 0,300)?></p>
						<a  class="btn btn-primary" href="<?php echo base_url().'Welcome/blog_single/'.$blog->Article_ID ;?>">Read More</a>
					</div>
					<?php }?>
					
					<div class="pagination-area">
						<ul class="pagination">
							<li><a href="" class="active">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
						</ul>
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