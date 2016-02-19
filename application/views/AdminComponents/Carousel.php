<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Carousel
      <small>Insert the Slider Information</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
<div class="panel panel-default">
<div class="panel-body">
<form action="/Welcome/AddSlider" method="post" enctype="multipart/form-data">

<div class="row">
      <div class="col-xs-4" >
        <div class="input-group"  >
          <span class="input-group-addon" >Header <span style="color:red">*</span></span> <input
            type="text" class="form-control" pattern="[A-Za-z\s]*"
            id="Header" name="Header" required="required"
             />
        </div>

      </div>
      </div>
      <br/>

<div class="row">
  <div class="col-xs-5">
    <div class="input-group">
      <span class="input-group-addon">Description</span>
      <textarea class="form-control" id="Description" name="Description"
        rows="3"></textarea>

  </div>
  </div>

  </div>

  </br>


  Your Photo: <input type="file" name="photo" size="25" />

</br>

  <button type="submit" name="submit" class="btn btn-primary">Add Carousel</button>

</form>
 </div>
 </div> 

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->