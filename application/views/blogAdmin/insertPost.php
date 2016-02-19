<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Blog Post
		<small>Add Blog Post</small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<br/>
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="/Welcome/add_post_data" method="post" >
					<div class="row">
						<div class="col-xs-6" >
							<div class="input-group"  >
								<span class="input-group-addon" >Title<span style="color:red">*</span></span> <input
								type="text" class="form-control"
								id="title" name="title" 
								/>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-xs-3">
							<div class="input-group">
								<span class="input-group-addon" >Priority <span style="color:red">*</span></span> <select
									class="form-control" id="priority" name="priority"
									required="required">
									<option value="1">High</option>
									<option value="2">Medium</option>
									<option value="3">Low</option>
								</select>
							</div>
						</div>
					</div>

					<br/>
					<div class="row">
						<div class="col-xs-4" >
							Photo:<span style="color:red">*</span> <input type="file" name="file" size="25" accept="image/*" required="required"/>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-8">
							<div class="input-group">
								<textarea class="form-control" id="message" name="message" required="required"
								rows="10" cols="110"></textarea>
							</div>
						</div>
					</div>
					<br/>
					<button type="submit" name="submit" class="btn btn-primary">Publish</button>
					
				</div>
				<br/>
				<!-- START STYLISH E MAIL -->
				<!-- END -->
			</form>
		</div>
		</section><!-- /.content -->
		</div><!-- /.content-wrapper -->