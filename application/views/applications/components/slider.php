<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<?php 
								$count = -1;

								foreach($carousel_items as $item) {
									$count++; 
									if ($count == 0) { continue;}
								?>
								<li data-target="#slider-carousel" data-slide-to=<?php echo $count ?>></li>
								
							<?php }?>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Adora</span>Apparel</h1>
									<h2><?php echo $carousel_items[0]->Heading?></h2>
									<p><?php echo $carousel_items[0]->Description?></p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<?php echo '<img src="'.$carousel_items[0]->imageLink.'" class="girl img-responsive"/>';  ?>
									<img src="/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
								<?php 
								$count = -1;

								foreach($carousel_items as $item) {
									$count++; 
									if ($count == 0) { continue;}
								?>
								<div class="item">
								<div class="col-sm-6">
									<h1><span>Adora</span>Apparel</h1>
									<h2><?php echo $item->Heading?></h2>
									<p><?php echo $item->Description?> </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<?php echo '<img src="'.$item->imageLink.'" class="girl img-responsive"/>';  ?>
									<img src="/images/home/pricing.png"  class="pricing" alt="" />
								</div>
								</div>
								<?php } ?>
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->