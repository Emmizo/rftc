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
    <div class="panel-heading" style="text-align: center; "><strong>Road<form action="" method="GET" ></div></strong>
  <div class="wrapper">
    <div class="panel-body">
    	<table class="table">
    		<tr>
    		<th>Road ID</th>
    		<th>Road name</th>
    		<th>Change Road</th>
    	</tr>
    	<?php
    	$query=mysqli_query($conn,"SELECT road.road_id,road.road_name,bus.plack FROM road
            INNER JOIN bus ON road.road_id=bus.road_id

            ") or die(mysqli_error($conn));
    	while ($row=mysqli_fetch_assoc($query)) {
    		
    	
    	?>
    	<tr>
    		<td><?=$row['road_id'];?></td>
    		<td><?=$row['road_name'];?></td>
    		<th><a href="update_car.php?plack=<?=$row['plack'];?>">Edit</a></th>
    	</tr>
    		<?php
    		}
    		?>
    	</table>
    </div>
   <center> <button class="btn btn-default"><a href="add_new_road.php" style="text-decoration-line: none;">Add new road</a></button></center>
</div>
</form>
</body>
</html>