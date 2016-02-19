
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Item Details
      <small>View All The Item Details</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
       <br/>
<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
    <table id="ItemDetails" class="table table-bordered table-hover">
      <thead>
        
        <tr>
         <td>Name</td>
            <td>Catagory</td>
            <td>Price</td>
            <td>Date</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        
      </thead>
      <tbody>
        <?php foreach($content as $row){ ?>
        <tr>
          <td><?php echo $row->Name; ?></td>
          <td><?php echo $row->Catagory; ?></td>
          <td><?php echo $row->Price; ?></td>
          <td><?php echo date("jS M Y",strtotime($row->Date))  ?></td>
          <td>
            <small>
              <a href="<?php echo base_url("Welcome/update_item")."/". $row->Item_ID; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            </small>
          </td>
          <td>
            <small>
              <a href="<?php echo base_url("Welcome/delete_item")."/".$row->Item_ID;?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"></span></a>
            </small>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div><!-- /.box-body -->
</div>



  </section><!-- /.content -->
</div><!-- /.content-wrapper -->