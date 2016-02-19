<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="javascript:void(0);" onclick="getSelected('Sportswear');">Sportswear</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('T-shirt');">T-shirts</a></li>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('Shirt');">Shirts</a></li>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('Pants');">Jeans</a></li>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('Caps');">Caps & Hats</a></li>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('Blazers');">Blazers</a></li>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('Underwears');">Underwears</a></li>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('Sweaters');">Sweaters</a></li>
											<li><a href="javascript:void(0);" onclick="getMaleSelected('Coats');">Over coats</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Tops');">Tops</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Legins');">Legins</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Skirts');">Skirts</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Blouses');">Blouses</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Jeans');">Jeans</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Hats');">Hats</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Underwears');">Underwears</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Bikinis');">Bikinis</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Frocks');">Frocks</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Sarees');">Sarees</a></li>
											<li><a href="javascript:void(0);" onclick="getFemaleSelected('Salwars');">Salwars</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="javascript:void(0);" onclick="getSelected('Kids');">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a hhref="javascript:void(0);" onclick="getSelected('Other');">Other</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Sizes</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Samll</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Medium</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Large</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>XL</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Free Size</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img id='add' src="" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				

	<script type="text/javascript">
			// This javascript submits the new selected male cateogry details to the server

			 function getMaleSelected(category)
			{
				$('#loadingModal').modal('show');
			   $.ajax({

			     type: "GET",
			     url: '../welcome/load_selected_items_male/' + category,
			     data: "category=" + category, // appears as $_GET['id'] @ your backend side
			     success: function(data) {
			           // data is ur summary
			           $('#loadingModal').modal('hide');
			          $('#refresh_this').html(data);
			     }

			   });

			}

			// This javascript submits the new selected female cateogry details to the server
			function getFemaleSelected(category)
			{
				$('#loadingModal').modal('show');
			   $.ajax({

			     type: "GET",
			     url: '../welcome/load_selected_items_female/' + category,
			     data: "category=" + category, // appears as $_GET['id'] @ your backend side
			     success: function(data) {
			           // data is ur summary
			           $('#loadingModal').modal('hide');
			          $('#refresh_this').html(data);
			     }

			   });

			}

			// This javascript submits the new selected cateogry details to the server
			function getSelected(category)
			{
				$('#loadingModal').modal('show');
			   $.ajax({

			     type: "GET",
			     url: '../welcome/load_selected_items/' + category,
			     data: "category=" + category, // appears as $_GET['id'] @ your backend side
			     success: function(data) {
			           // data is ur summary
			           $('#loadingModal').modal('hide');
			          $('#refresh_this').html(data);
			     }

			   });

			}

			(function() 
			{     // function expression closure to contain variables
			    var i = 0;
			    var pics = new Array();
			    <?php foreach($SideBarAdvertiesments as $item){ ?>
			    	pics.push('<?php echo $item->imageLink ;?>');
			    	<?php } ?>
			    var el = document.getElementById('add');  // el doesn't change
			    function toggle() {
			        el.src = pics[i];           // set the image
			        i = (i + 1) % pics.length;  // update the counter
			    }
			    setInterval(toggle, 4000);
			})();             // invoke the function expression

	</script>