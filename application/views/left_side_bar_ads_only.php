<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="shipping text-center"><!--shipping-->
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						<div class="shipping text-center"><!--shipping-->
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						<div class="shipping text-center"><!--shipping-->
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>

	<script type="text/javascript">
			 function getSummary(id)
			{
			   $.ajax({

			     type: "GET",
			     url: '/welcome/search/tri',
			     data: "id=" + id, // appears as $_GET['id'] @ your backend side
			     success: function(data) {
			           // data is ur summary
			          $('#refresh_this').html(data);
			     }

			   });

			}
	</script>