
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Item Inquiries 
      <small>View all the item Inquiries</small>
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
            <td>Item</td>
            <td>Comment</td>
            <td>Date</td>
            <td>Responded</td>
            <td>Reply</td>
            <td>Delete</td>
        </tr>
        
      </thead>
      <tbody>
        <?php foreach($content as $row){ ?>
        <tr>
          <td><?php echo $row->Name; ?></td>
          <td><?php echo $row->ItemName; ?></td>
          <td><?php echo $row->Comment; ?></td>
          <td><?php echo date("jS M Y",strtotime($row->AddedTime))  ?></td>
          <td>
          
          <?php if(($response=$row->Responded)==1)
          {
            echo "<i class=\"fa fa-fw fa-thumbs-o-up\"></i> <font color=\"green\">Responded</font>";
          }
          else
          {
            echo "<i class=\"fa fa-fw fa-thumbs-o-down\"></i> <font color=\"red\">Not Responded</font>";
          }
          ?>
          </td>
          <td>
            <small>
              <a href="<?php echo base_url("Welcome/RedirectItemInquiry")."/". $row->id; ?>"><span class="fa fa-fw fa-mail-reply-all"></span></a>
            </small>
          </td>
          <td>
            <small>
              <a href="<?php echo base_url("Welcome/DeleteII")."/".$row->id;?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"></span></a>
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