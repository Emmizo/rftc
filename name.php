<?php
include('connect.php');
if (!empty($_POST["licence_drive_id"])) {
  //echo $road_id;
 $licence_drive_id = $_POST["licence_drive_id"]; 
  $query="SELECT road.road_id,road.road_name from road
INNER JOIN registration ON registration.road_id=road.road_id
   where registration.licence_drive_id='$licence_drive_id'";
 $results = mysqli_query($conn, $query)or die(mysqli_error($conn));
  ?><option selected="selected"></option><?php
while ($bus=mysqli_fetch_assoc($results)){
 ?>
 <option value="<?php echo $bus["road_id"];?>"><?php echo $bus["road_name"];?>
        </option>       
      <?php
        }
        }
            ?>