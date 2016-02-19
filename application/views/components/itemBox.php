<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
				<div class="productinfo text-center">
					<?php echo '<img src="'.$item->imageLink.'" height="100%" width="100%"/>';  ?>
					<h2>RS &nbsp<?php echo $item->Price?></h2>
					<p><?php echo $item->Name?></p>
					<a href="<?php echo site_url('welcome/add_to_cart/'.$item->Item_ID.'/'.$item->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>RS &nbsp<?php echo $item->Price?></h2>
						<p><?php echo $item->Name?></p>
						<a href="<?php echo site_url('welcome/add_to_cart/'.$item->Item_ID.'/'.$item->Price); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
				</div>

				<?php if($item->DiscountPercentage != 0) {
					$disImage = $item->DiscountPercentage."off.png";
				?>
				<img src="/images/home/<?php echo $disImage; ?>" class="new" alt="">
				<?php } ?>
				
		</div>

		<div class="choose">
			<ul class="nav nav-pills nav-justified">
				<li><a href="javascript:void(0);" onclick="openModal('<?php echo $item->Item_ID;?> ','<?php echo $item->Name;?> ');" ><i class="fa fa-plus-square"></i>Inquire about this</a></li>
				<li><a href=<?php echo ('../welcome/product_details/').$item->Item_ID;?> ><i class="fa fa-plus-square"></i>View this item</a></li>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">

			 function openModal(id,name)
			{
				document.getElementById('name').innerHTML = name;  // el doesn't change
			    document.getElementById('idd').value = id;  // el doesn't change
				$('#inqModal').modal('show');
			}
</script>
