
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog Post
      <small>View all blog post</small>
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
            <td>Title</td>
            <td>Body</td>
            <td>Priority</td>
            <td>Date</td>
            <td>Image Name</td>
        </tr>
        
      </thead>
      <tbody>
        <?php foreach($content as $row){ ?>
        <tr>
          <td><?php echo $row->Heading; ?></td>
          <td><?php echo substr($row->Content, 0,30); ?></td>
          <td><?php echo $row->Priority; ?></td>
          <td><?php echo date("jS M Y",strtotime($row->Date))  ?></td>
          <td><?php echo $row->imageLink; ?></td>
          <td>
            <small>
              <a href="<?php echo base_url("Welcome/update_post_data")."/". $row->Article_ID; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            </small>
          </td>
          <td>
            <small>
              <a href="<?php echo base_url("Welcome/delete_item_blog")."/".$row->Article_ID;?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this post?');"></span></a>
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