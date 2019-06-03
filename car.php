<?php
include('header.php');
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="panel panel-default">
		<div class="panel-heading">
  <div class="panel panel-primary" style="max-width: 900px; margin: auto;">
    <div class="panel-heading" style="text-align: center; "><strong>Car available in our campany<form action=" " method="GET" ></div></strong>
  <div class="wrapper">
    <div class="panel-body">
    	<table class="table">
    		<tr>
    		<th>Car plack</th>
    		<th>Road</th>
    		<th>status</th>
    		<th>Change Road</th>
    	</tr>
    	<?php
    	$query=mysqli_query($conn,"SELECT bus.plack,bus.road_id,bus.status,road.road_name FROM bus
    		INNER JOIN road ON road.road_id=bus.road_id") or die(mysqli_error($conn));
    	while ($row=mysqli_fetch_assoc($query)) {
    		
    	
    	?>
    	<tr>
    		<td><?=$row['plack'];?></td>
    		<td><?=$row['road_name'];?></td>
            <?php
            if ($row['status']=='ON') {
            ?>
    		<td ><button class="btn btn-default" style="background-color: green; color: white;"><?=$row['status']?></button></td>
            <?php
            }
             else{
                ?>
                 <td ><button class="btn btn-default" style="background-color: red;color: white;"><?=$row['status']?></button></td>
                 <?php
             }
             ?>
    		<th><a href="update_car.php?plack=<?=$row['plack']?>">Edit</a></th>
    	</tr>
    		<?php
    		}
    		?>
    	</table>
    </div>
   <center> <button class="btn btn-default"><a href="add_new_car.php" style="text-decoration-line: none;">Add new car</a></button></center>
</div>
</form>
</body>
</html>