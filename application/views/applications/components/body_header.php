<body>
<?php include('item_inquiry_model.php'); ?>	
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +94 767 231 571</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> jspsproject2015@yahoo.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="http://jsps2015.blogspot.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="http://jsps2015.blogspot.com/"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/pub/adora-apparels/98/90/147"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="http://jsps2015.blogspot.com/"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="http://jsps2015.blogspot.com/"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href=<?php echo base_url(); ?>><img src="/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=<?php echo site_url('welcome/change_user_profile'); ?>><i class="fa fa-user"></i> <?php echo $this->session->userdata('Name') ?></a></li>
								<li><a href=<?php echo site_url('welcome/checkout'); ?>><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href=<?php echo site_url('welcome/cart'); ?>><i class="fa fa-shopping-cart"></i>
									Cart <span class="label label-danger"><?php if($this->cart_qty>0) echo $this->cart_qty; ?></span> </a></li>
									<?php if(($this->session->userdata('Name') != null)) { ?>
										<li><a href=<?php echo site_url('welcome/logout'); ?>><i class="fa fa-lock"></i> Logout</a></li>
									<?php } else { ?>
										<li><a href=<?php echo site_url('welcome/login'); ?>><i class="fa fa-lock"></i> Login</a></li>
									<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href=<?php echo site_url('welcome/index'); ?> class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href=<?php echo site_url('welcome/shop'); ?>>Products</a></li>
										<li><a href=<?php echo site_url('welcome/checkout'); ?>>Checkout</a></li> 
										<li><a href=<?php echo site_url('welcome/cart'); ?>>Cart</a></li> 
										<li><a href=<?php echo site_url('welcome/login'); ?>>Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href=<?php echo site_url('welcome/blog'); ?>>Blog List</a></li>
										<li><a href="#">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href=<?php echo site_url('welcome/contact_us'); ?>>Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="<?php echo base_url();?>Welcome/search" method="post" >
								<input type="text" placeholder="Search" name="searchtext" id="searchtext"/>
								<button name="search" class="btn btn-default" id="search" value="Srch">Search</button>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
var tag_x = <?php echo json_encode($auto_load_data_names);?>;
var tags = tag_x.split(',');
$( "#searchtext" ).autocomplete({
source: function(req, response) {
var results = $.ui.autocomplete.filter(tags, req.term);
response(results.slice(0, 5));//for getting 5 results
}
});
</script>