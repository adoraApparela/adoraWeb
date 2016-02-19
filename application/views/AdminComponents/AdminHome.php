<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrator Panel
      <small>Adora Apparels</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
  </br>
    <!-- Your Page Content Here -->
    <?php
    //var_dump($records);
    ?>

    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
            <?php
            echo $records[0];
            ?>
            </h3>
            <p>Weekly Purchases</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/Welcome/purchaseChart" 
          class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
            <?php
            echo $records[1];
            ?>
            </h3>
            <p>Weekly Messages</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/Welcome/LoadGeneralinquiry" 
          class="small-box-footer">Reply Messages <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
            <?php
            echo $records[2];
            ?>
            </h3>
            <p>Weekly Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/Welcome/userRegChart" 
          class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
            <?php
            echo $records[3];
            ?>
            </h3>
            <p>Weekly Subscribers</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/Welcome/subscriberIndex" 
          class="small-box-footer">Promote Items <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div>

    <?php 
    if($records[4])
    {
      echo "<div class=\"alert alert-success alert-dismissable\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
      <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
      echo "<b>".$records[5]."</b>";
      echo "</br>";
      echo $records[6];
      echo"</div>";
    }
    else
    {
      echo "<div class=\"alert alert-warning alert-dismissable\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
      <h4><i class=\"icon fa fa-warning\"></i> Alert!</h4>";
      echo "<b>".$records[5]."</b>";
      echo "</br>";
      echo $records[6];
      echo"</div>";
    }

    if($records[1]>0)
    {
      echo "<div class=\"alert alert-warning alert-dismissable\">
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
      <h4><i class=\"icon fa fa-warning\"></i> Alert!</h4>";
      echo "<b>Reply to Messages</b>";
      echo "</br>";
      echo "You have ".$records[1]." messages to reply";
      echo"</div>";  
    }

    ?>
    
    


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->