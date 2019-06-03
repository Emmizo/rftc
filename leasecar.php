<?php
include('header.php');
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<body>
	<div class="panel panel-primary" style=" margin: auto;">
<div class="panel-heading"><center><strong>Lease Car</strong></center></div>
	<?php
	if (isset($_POST['leave'])) {
		
	
	$ID=$_POST['ID'];
	$licence_drive_id=$_POST['licence_drive_id'];
	$plack=$_POST['plack'];
	$road_id=$_POST['road_id'];
	$time_leave=$_POST['time_leave'];
	$time_lease=$_POST['time_lease'];
	$date_done=$_POST['date_done'];
	$status=$_POST['status'];
	$query3=mysqli_query($conn,"SELECT * FROM setting_table where licence_drive_id='$licence_drive_id' AND ID='$ID' AND road_id='$road_id' AND plack='$plack'")
	or die(mysqli_error($conn));
	$query7=mysqli_query($conn,"SELECT * FROM archive where licence_drive_id='$licence_drive_id' AND ID='$ID' AND road_id='$road_id' AND plack='$plack'")or die(mysqli_error($conn));
	if (mysqli_num_rows($query3)>0) {
		$rows = mysqli_fetch_assoc($query3);
		$query4=mysqli_query($conn,"UPDATE setting_table SET time_lease='$time_lease',status='$status' where licence_drive_id='$licence_drive_id' AND ID='$ID' AND road_id='$road_id' AND plack='$plack'")or die(mysqli_error($conn));
	}
	if (mysqli_num_rows($query7)>0) {
		$query5=mysqli_query($conn,"UPDATE archive SET time_lease='$time_lease',status='$status' where licence_drive_id='$licence_drive_id' AND ID='$ID' AND road_id='$road_id' AND plack='$plack' ")or die(mysqli_error($conn));
		header("location:./viewreport.php");
		}

/*elseif ($query5=false) {
	
$query=(mysqli_query($conn,"INSERT INTO `archive` ( `ID`, `licence_drive_id`, `plack`, `road_id`, `time_leave`, `time_lease`,`date_done` `status`) VALUES ('$ID', '$licence_drive_id', '$plack', '$road_id', '$time_leave', '$time_lease', `$date_done`,'$status');"));

header("location:./viewreport.php");
	}*/
	else{

echo "<center><strong style='color:red'>Check car is not match with driver</strong></center>";
}}
	?>

   <div class="panel-body">
    <form class="form-horizontal" method="POST" name="drives"  onsubmit="return validateform()">
    			<div class="row"  >
						
							<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12" >
							<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>Full name</label>
								<select name="ID" class="form-control name">
									<option selected="selected"></option>
									<?php
                					include('connect.php');
                					
                    				$query = "SELECT * FROM drivers 
                    				inner join setting_table ON drivers.ID=setting_table.ID WHERE setting_table.status='Busy'";
                    				$results=mysqli_query($conn, $query);
                    				//loop
                   				 foreach ($results as $drive){
                   				 			 
                   				 		?>
                   				 			<option value="<?php echo $drive["ID"];?>"><?php echo $drive["f_name"]." " .$drive["l_name"];?></option>

									<?php
												}
                					?>
								</select>
								</div>
								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
								<label>Licence Driver ID </label>
									<select name="licence_drive_id" class="form-control licence">
									<option selected="selected"></option>
								</select>
								</div>
								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
								<label>Road </label>
									<select name="road_id" class="form-control road" id="road_id">
									<option selected="selected"></option>
								</select>
								</div>
							<div class=" input-field col-lg-12 col-md-12 col-sm-12">
								<label>Car plack </label>
									<select name="plack" class="form-control bus">
									<option selected="selected"></option>
								</select><br>
								</div>
								
								<input type="hidden" name="time_lease" value="<?php echo "Brought at,".date('H:i:s'); ?>">
								<input type="hidden" name="time_leave">
								<input type="hidden" name="date_done" value="<?php echo date('l,d/m/y'); ?>">
								<input type="hidden" name="status" value="Free">
								<div class="input-field col-lg-12 col-md-12 col-sm-12">
								<button class="btn btn-default"  name="leave" id="button" >Leave now</button>
							</div>
							</div>
						</div>
					</body>
				</html>
<script   src="https://code.jquery.com/jquery-3.1.1.js"   integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   crossorigin="anonymous"> </script>
 <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
					<script>
        					$(document).ready(function()
{
	$(".name").change(function()
	{
		var ID=$(this).val();
		var dataString = 'ID='+ ID;
		//alert(dataString);
		
		$.ajax
		({
			type: "POST",
			url: "licence.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".licence").html(html);
			} 
		});
	});
	$(".licence").change(function()
	{
		var licence_drive_id=$(this).val();
		var dataString = 'licence_drive_id='+ licence_drive_id;
		//alert(dataString);
		
		$.ajax
		({
			type: "POST",
			url: "name.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".road").html(html);
			} 
		});
	});
	$(".road").change(function()
	{
		var road_id=$(this).val();
		var dataString = 'road_id='+ road_id;
		//alert(dataString);
		
		$.ajax
		({
			type: "POST",
			url: "occupied.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".bus").html(html);
			} 
		});
	});
});
    						</script>