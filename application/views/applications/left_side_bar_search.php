<div class="col-sm-3">
	<div class="left-sidebar">
		
		<div class="brands_products"><!--size_products-->
		<h2>Sizes</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="javascript:void(0);" onclick="getSummary('Small_Quantity');"> <span class="pull-right"></span>Samll</a></li>
				<li><a href="javascript:void(0);" onclick="getSummary('Medium_Quantity');"> <span class="pull-right"></span>Medium</a></li>
				<li><a href="javascript:void(0);" onclick="getSummary('Large_Quantity');"> <span class="pull-right"></span>Large</a></li>
				<li><a href="javascript:void(0);" onclick="getSummary('XL_Quantity');"> <span class="pull-right"></span>XL</a></li>
				<li><a href="javascript:void(0);" onclick="getSummary('FreeSize_Quantity');"> <span class="pull-right"></span>Free Size</a></li>
			</ul>
		</div>
		</div><!--/size_products-->
		<form action="#" method="post" class="chkCat" id="chkCat">
			<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<h2>Category</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="" onclick="">
						<label>
							<input type="checkbox" name="chk_catag[]" value="sportswear" id="sportswear" onclick="getTypefilter('sportswear')">
							&nbsp Sportswear
						</a>
					</label>
					</h4>
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
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_t-shirts" id="sportswear" onclick="getTypefilter('sportswear')">
									&nbsp T-shirts
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_shirts" onclick="getTypefilter('sportswear')">
									&nbsp Shirts
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_jeans" onclick="getTypefilter('sportswear')">
									&nbsp Jeans
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_caps_hats" onclick="getTypefilter('sportswear')">
									&nbsp Caps & Hats
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_blazer" onclick="getTypefilter('sportswear')">
									&nbsp Blazers
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_underwears" onclick="getTypefilter('sportswear')">
									&nbsp Underwears
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_sweaters" onclick="getTypefilter('sportswear')">
									&nbsp Sweaters
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="m_over_coats" onclick="getTypefilter('sportswear')">
									&nbsp Over coats
								</label>
							</li>
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
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="w_over_coats" onclick="getTypefilter('sportswear')">
									&nbsp Tops
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="w_legins" onclick="getTypefilter('sportswear')">
									&nbsp Legins
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="chk_catag[]" value="w_skirts" onclick="getTypefilter('sportswear')">
									&nbsp Skirts
								</label>
							</li>
							<li><label>
								<input type="checkbox" name="chk_catag[]" value="w_blouses" onclick="getTypefilter('sportswear')">
								&nbsp Blouses
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="chk_catag[]" value="w_jeans" onclick="getTypefilter('sportswear')">
								&nbsp Jeans
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="chk_catag[]" value="w_hats" onclick="getTypefilter('sportswear')">
								&nbsp Hats
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="chk_catag[]" value="w_underwears" onclick="getTypefilter('sportswear')">
								&nbsp Underwears
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="chk_catag[]" value="w_bikinis" onclick="getTypefilter('sportswear')">
								&nbsp Bikinis
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="chk_catag[]" value="w_frocks" onclick="getTypefilter('sportswear')">
								&nbsp Frocks
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="chk_catag[]" value="w_sarees" onclick="getTypefilter('sportswear')">
								&nbsp Sarees
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="chk_catag[]" value="w_salwars" onclick="getTypefilter('sportswear')">
								&nbsp Salwars
							</label>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<label>
					<input type="checkbox" name="chk_catag[]" value="kids" onclick="getTypefilter('sportswear')">
					<a href="#"> Kids </a>
					</lable>
					</h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					<label>
						<input type="checkbox" name="chk_catag[]" value="other" onclick="getTypefilter('sportswear')">
						<a href="#">Other</a></h4>
					</label>
				</div>
			</div>
			</div><!--/category-products-->
		</form>
		<div class="price-range"><!--price-range-->
		<h2>Price Range</h2>
		<form action="<?php echo base_url();?>Welcome/search_with_filter" method="post" ><!--form-price-range-->
		<!--		<div class="well text-center">
				<input name = "price" type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="100" data-slider-value="[200,5000]" id="sl2" ><br />
				<b class="pull-left">Rs 0</b> <b class="pull-right">Rs 10000</b>
		</div>
		-->
		<div class="well text-center">
			<input type="number" placeholder="Min" name="min" id="min" size="5" required/>&nbsp
			<input type="number" placeholder="Max" name="max" id="max" size="5" required/>
			<br />
			<br />
			
			<button name="filter" class="btn btn-default get" id="filter" value="Fltr">Filter</button>
			<input type="hidden" name="hidden_keyword" value="<?php echo $keyword; ?>" id="hidden_keyword"/>
			
		</div>
	
		</form><!-- /form -price-range-->
		</div><!--/price-range-->
		
	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
			var keywordx = document.getElementById("hidden_keyword").value;
			if(keywordx.length == 0)
			{
				keywordx = "-1";
			}
		function getSummary(idx)//function
		{
			$('#loadingModal').modal('show');
		$.ajax({
		type: "GET",
		url: '/Welcome/filter_by_size/' + idx + '/' + keywordx,
		data: {id:idx, keyword:keywordx}, // appears as $_GET['id'] @ your backend side
		success: function(data) {
		// data is ur summary
		$('#loadingModal').modal('hide');
		$('#refresh_this').html(data);
		}
			
		});
		}// function
		
		var sports = document.forms['chkCat'].elements[ 'chk_catag[]'];
		function getTypefilter(idz)
		{
			$('#loadingModal').modal('show');
			var datacc = <?php echo json_encode($raw_data);?>;
			var values = new Array();
			$.each($("input[name='chk_catag[]']:checked"), function() {
			values.push($(this).val());
			});

			$.ajax({
			type: "GET",
			url: '/Welcome/getType_filter/',
			data: {value:values, datac:datacc, keyw:keywordx},// appears as $_GET['id'] @ your backend side
			success: function(data) {
			// data is ur summary
			$('#loadingModal').modal('hide');
			$('#refresh_this').html(data);
			}
				
			});
		}
</script>
