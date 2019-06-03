<?php
include('connect.php');
if (!empty($_POST["road_id"])) {
  //echo $road_id;
 $road_id = $_POST["road_id"]; 
	$query="SELECT bus.plack,bus.status from bus
INNER JOIN road ON bus.road_id=road.road_id
INNER JOIN setting_table ON setting_table.plack=bus.plack
   where road.road_id='$road_id' AND setting_table.status='Busy' ";
  


 $results = mysqli_query($conn, $query)or die(mysqli_error($conn));
  ?><option selected="selected"></option><?php
while ($bus=mysqli_fetch_assoc($results)){
 ?>
 <option value="<?php echo $bus["plack"];?>"><?php echo $bus["plack"];?>
    		</option>       
			<?php
      	 
      	  }
      	}
      	   	?>