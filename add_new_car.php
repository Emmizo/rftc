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
  <div class="panel panel-primary">
    <div class="panel-heading" style="text-align: center;"><strong >ADD NEW CAR<form action="" method="POST" ></div></strong>
  <div class="wrapper">
    <div class="panel-body">
    	<div class="row"  >
    		<?php
    		if (isset($_POST['submit'])) {
    		$plack=$_POST['plack'];
    		$road_id=$_POST['road_id'];
    		$status=$_POST['status'];
    		$qr=mysqli_query($conn,"SELECT * FROM bus where plack='$plack'")or die(mysqli_error($conn));
    		if(mysqli_num_rows($qr)>0){
    			echo "<center><strong style='color:red;'>This car already registered</strong></center>";
    		}
    		else{
    		$query=mysqli_query($conn,"INSERT INTO `bus` (`plack`, `road_id`, `status`) VALUES ('$plack', '$road_id', '$status');")or die(mysqli_error($conn));

    		header("location:./car.php");
    			}}
    		?>
						
							<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12" >
							<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>Car plack</label>
								<input type="text" class="form-control" name="plack"  onkeypress="return noNumbers(event)">
								</div>
								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
							   	
								<label>Road</label>
									<select name="road_id" class="form-control">
									<option></option>
									<?php
                					
                    				$query = "SELECT * FROM road";
                    				$results=mysqli_query($conn, $query);
                    				//loop
                   				 foreach ($results as $dept){
                   				 			 //$program_id=$dept['program_id'];
                   				 		?>
                   				 			<option value="<?php echo $dept["road_id"];?>"><?php echo $dept["road_name"];?></option>

									<?php
												}
                					?>
								</select>
								</div>
								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
								<label>Status</label>
								<select name="status" class="form-control">
									<option></option>
									<option>ON</option>
									<option>OFF</option>
								</select>
							</div>
								<div class="input-field col-lg-12 col-md-12 col-sm-12">
								<button class="btn btn-default"  name="submit" id="button" >Submit</button>
							</div>
							</div>
    </div>
</div>
</form>
</body>
</html>