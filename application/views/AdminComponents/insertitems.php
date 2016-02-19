
      <!-- Left side column. contains the logo and sidebar -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Item Information
            <small>Insert data to add an item</small>
          </h1>

         <br/>
     
    <div class="panel panel-default">
		<div class="panel-body"> 	
         <form action="/Welcome/insertItemIndex" method="post" enctype="multipart/form-data">
          
          <div class="row">
			<div class="col-xs-4" >
				<div class="input-group"  >
					<span class="input-group-addon" >Item Name <span style="color:red">*</span></span> <input
						type="text" class="form-control" pattern="[A-Za-z\s]*"
						id="name" name="name" required="required"
						 />
				</div>

			</div>
			</div>
			<br/>

			<div class="row">
			<div class="col-xs-3">
							<div class="input-group">
								<span class="input-group-addon" >Category <span style="color:red">*</span></span> <select
									class="form-control" id="catagory" name="catagory"
									required="required">
									<option value="mT-shirt">Mens  : T-shirt</option>
									<option value="mShirts">Mens  : Shirts</option>
									<option value="mPants">Mens  : Pants</option>
									<option value="mCaps">Mens  : Caps</option>
									<option value="mBlazers">Mens  : Blazers</option>
									<option value="mUnderwears">Mens  : Underwears</option>
									<option value="mSweaters">Mens  : Sweaters</option>
									<option value="mCoats">Mens  : Coats</option>
									<option value="fTops">Women : Tops</option>
									<option value="fLegins">Women : Legins</option>
									<option value="fSkirts">Women : Skirts</option>
									<option value="fBlouses">Women : Blouses</option>
									<option value="fJeans">Women : Jeans</option>
									<option value="fHats">Women : Hats</option>
									<option value="fUnderwears">Women : Underwears</option>
									<option value="fBiknis">Women : Bikinis</option>
									<option value="fFrocks">Women : Frocks</option>
									<option value="fSarees">Women : Sarees</option>
									<option value="fSalwars">Women : Salwars</option>
									<option value="Kids">Kids</option>
									<option value="Sportswear">Sports</option>
									<option value="Other">Other</option>
								</select>
							</div>
							</div>
							</div>
							</br>
							

		<div class="row">
					<div class="col-xs-5">
						<div class="input-group">
							<span class="input-group-addon">Description</span>
							<textarea class="form-control" id="description" name="description"
								rows="3"></textarea>

					</div>
					</div>

					</div>
					<br/>

		<div class="row">
		<div class="col-xs-4" >
				<div class="input-group"  >
					<span class="input-group-addon" >Item Price <span style="color:red">*</span></span> <input
						type="text" class="form-control" pattern = "(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)"
						id="price" name="price" required="required"
						 />
				</div>

			</div>
			</div>
			<br/>

		<div class="row">
		<div class="col-xs-4" >
				<div class="input-group"  >
					<span class="input-group-addon" >Date <span style="color:red">*</span></span> <input
						data-provide="datepicker" type="date" class="form-control" 
						id="date" name="date" required="required" value="<?php echo date("Y-m-d"); ?>"
						/>
				</div>

			</div>
			</div>
			<br/>
			<div class="row">
			<div class="col-xs-4" >
				Your Photo: <input type="file" name="photo" size="25" />
			</div>
			</div>
		</div>
		</div>

		

		<div class="panel panel-default">
		  <div class="panel-heading">Quantity</div>
		  <div class="panel-body">

          <div class="row">
			<div class="col-xs-3" >
				<div class="input-group"  >
					<span class="input-group-addon" >Small <span style="color:red"></span></span> <input
						type="text" class="form-control" pattern = "[0-9]*"
						id="small_qty" name="small_qty"
						 />
				</div>

			</div>
			</div>
			<br/>

			<div class="row">
			<div class="col-xs-3" >
				<div class="input-group"  >
					<span class="input-group-addon" >Medium <span style="color:red"></span></span> <input
						type="text" class="form-control" pattern = "[0-9]*"
						id="medium_qty" name="medium_qty"
						 />
				</div>

			</div>
			</div>
			<br/>

			<div class="row">
			<div class="col-xs-3" >
				<div class="input-group"  >
					<span class="input-group-addon" >Large <span style="color:red"></span></span> <input
						type="text" class="form-control" pattern = "[0-9]*"
						id="large_qty" name="large_qty"
						 />
				</div>

			</div>
			</div>
			<br/>

			<div class="row">
			<div class="col-xs-3" >
				<div class="input-group"  >
					<span class="input-group-addon" >X-Large <span style="color:red"></span></span> <input
						type="text" class="form-control" pattern = "[0-9]*"
						id="xlarge_qty" name="xlarge_qty"
						 />
				</div>

			</div>
			</div>
			<br/>

			<div class="row">
			<div class="col-xs-3" >
				<div class="input-group"  >
					<span class="input-group-addon" >Free Size <span style="color:red"></span></span> <input
						type="text" class="form-control" pattern = "[0-9]*"
						id="freesize_qty" name="freesize_qty" 
						 />
				</div>

			</div>
			</div>
			<br/>
			
				<button type="submit" name="submit" class="btn btn-primary">Add Item</button>
			</form>
		</div>
		</div>
		

			
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->