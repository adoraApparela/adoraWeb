<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Filter Results</h2>
     						
          <?php 
          	if (count($Items) == 0) {
          		echo "<h4 class=\"title text-center\">Sorry! We have no such items in our store. Try another item</h4>";
          	}
          	
          		foreach($Items as $item){
          ?>

          <div class="se-pre-con"></div>
               <?php include('components/itemBox.php'); ?>
               <?php }?>  
   
						
						
	</div><!--features_items-->

					
</div>