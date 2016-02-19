

	<section id="advertisement">
		<div class="container">
			<a id="link" href="">
				<img id="add" src="" alt="" href="facebook.com"/>
			</a>
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<?php include ('components/left_side_bar.php'); ?>
				
				<div class="col-sm-9 padding-right">
					<div id="refresh_this" class="features_items"><!--features_items-->
						<h2 class="title text-center">Available Items</h2>
						
						<?php foreach($latest_items as $item){?>
     						<?php include('components/itemBox.php'); ?>
     					<?php }?>  
   
						
					</div><!--features_items-->
						
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		
	</section>

	
	<script>
	(function() 
			{     // function expression closure to contain variables
			    var i = 0;
			    var pics = new Array();
			    var links = new Array();
			    <?php foreach($BannerAdvertiesments as $item){ ?>
			    	pics.push('<?php echo $item->imageLink ;?>');
			    	links.push('<?php echo $item->redirectTo ;?>');
			    <?php } ?>
			    var el = document.getElementById('add');  // el doesn't change
			    var li = document.getElementById('link');  // el doesn't change
			    function toggle() {
			        el.src = pics[i];           // set the image
			        li.href = links[i];
			        i = (i + 1) % pics.length;  // update the counter
			    }
			    setInterval(toggle, 4000);
			})();             // invoke the function expression

	</script>





  