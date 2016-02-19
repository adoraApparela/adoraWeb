<div class="modal fade" id="inqModal">
	  <div class="modal-dialog" >
	    <div class="modal-content">

		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Ask more from us about</h4>
		        <h3 id="name"></h3>
		        
	      	</div>

		    <div class="modal-body">

		        <form  action="<?php echo base_url();?>welcome/add_item_inquiry" method="post">
					<span>
					<div class="form-group col-md-12">
						<input type="hidden" name="itmID" class="form-control" required="required" id="idd" />
					</div>
					<div class="form-group col-md-12">
						<input type="text" name="name" class="form-control" required="required" placeholder="Your Name"/>
					</div>
					<div class="form-group col-md-12">
						<input type="email" name="email" class="form-control" required="required" placeholder="Email Address"/>
					</div>
					<div class="form-group col-md-12">
						<input type="text" name="subject" class="form-control" required="required" placeholder="Subject"/>
					</div>
					</span>
					<textarea rows="10" name="comment" class="form-control" required="required" placeholder="Just ask what you want to know here..."></textarea>
					</br>
					<button type="submit" class="btn btn-primary pull-right">
						Submit
					</button>
				</form>

		    </div>
		      <div class="modal-footer">
		      </br></br>
		  </div>

		   

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

