<?php
include('connect.php');
if (!empty($_POST["ID"])) {
  //echo $road_id;
 $ID = $_POST["ID"]; 
	$query="SELECT registration.licence_drive_id from registration
INNER JOIN drivers ON drivers.ID=registration.ID
   where drivers.ID='$ID'";
  


 $results = mysqli_query($conn, $query)or die(mysqli_error($conn));
  ?><option selected="selected"></option><?php
while ($bus=mysqli_fetch_assoc($results)){
 ?>
 <option value="<?php echo $bus["licence_drive_id"];?>"><?php echo $bus["licence_drive_id"];?>
    		</option>       
			<?php
      	 
      	  }
      	}
      	   	?>