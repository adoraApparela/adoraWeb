
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cart Details
      <small>View All The Cart Details for all users</small>
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
         <td>User Name</td>
            <td>Item</td>
            <td>Date</td>
            <td>Unit Price</td>
            <td>Quantity</td>
            <td>Total</td>
        </tr>
        
      </thead>
      <tbody>
        <?php foreach($content as $row){ ?>
        <tr>
          <td><?php echo $row->uName; ?></td>
          <td><?php echo $row->iName; ?></td>
          <td><?php echo date("jS M Y",strtotime($row->AddedTime))  ?></td>
          <td><?php echo $row->UnitPrice; ?></td>
          <td><?php echo $row->Quantity; ?></td>
          <td><?php echo $row->Total; ?></td>
          <td>
            <small>
              <a href="<?php echo ("../Welcome/delete_cart_item")."/".$row->Cart_ID."/".$row->Item_ID."/".$row->Quantity;?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"></span></a>
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