
<?php include ('components/head_section.php'); ?>
<?php include ('components/body_header.php'); ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php if (count($Items) <=0) { ?>
						<tr><td>
							<h4>You have no items in your cart</h4>
						</td></tr>
						<?php } ?>
						<?php foreach ($Items as $item) { ?>
						<tr>
							<td class="cart_product">
								<a href=<?php echo ('../welcome/product_details/').$item->Item_ID;?>><?php echo '<img src="'.$item->imageLink.'" id="img" height="150px"/>';  ?></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $item->Name?></a></h4>
								<p><?php echo $item->Description?></p>
							</td>
							<td class="cart_price">
								<p>RS:&nbsp<?php echo $item->UnitPrice?></p>
							</td>
							<td class="cart_price">
								<div class="cart_quantity_button">
									<p><?php echo $item->Quantity?></p>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">RS:&nbsp<?php echo $item->Total?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=<?php echo ('../welcome/remove_cart_item/'.$item->Cart_ID.'/'.$item->Item_ID.'/'.$item->Quantity);?>><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>RS:&nbsp<?php echo $this->cart_total; ?></span></li>
							<li>VAT(%4) <span>RS:&nbsp<?php $val = $this->cart_total*4/100.0 ; echo $val; ?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li><font color="red">Total</font> <span><font color="red">RS:&nbsp<?php echo $this->cart_total + $val ;?></font></span></li>
						</ul>
							<a class="btn btn-default update" href="../welcome/shop">Continue Shopping</a>
							<a class="btn btn-default check_out" href="../welcome/checkout">Proceed to Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include ('components/footer.php'); ?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>