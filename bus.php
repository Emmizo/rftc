<?php
include('connect.php');
if (!empty($_POST["road_id"])) {
  //echo $road_id;
 $road_id = $_POST["road_id"]; 
	$query="SELECT bus.plack,bus.status from bus
INNER JOIN road ON bus.road_id=road.road_id
INNER JOIN registration ON registration.plack=bus.plack
   where road.road_id='$road_id' ";
  


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