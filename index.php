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
<div class="panel panel-primary" style=" max-width: 1100px; margin: auto;">
<div class="panel-heading"><center><strong>NEW DRIVERS FROM RFTC</strong></center></div>
   <div class="panel-body">
    <form class="form-horizontal" method="POST" name="drivers"  onsubmit="return validateform()">
    			<div class="row"  >
<?php
if (isset($_POST['submit'])) {
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$ID=$_POST['ID'];
	$road_id=$_POST['road_id'];
	$licence_drive_id=$_POST['licence_drive_id'];
	$plack=$_POST['plack'];
	$category=$_POST['category'];
	$time_leave=$_POST['time_leave'];
	$time_lease=$_POST['time_lease'];
	$status=$_POST['status'];

	$query=mysqli_query($conn,"INSERT IGNORE INTO `drivers` (`ID`, `f_name`, `l_name`) VALUES ('$ID', '$f_name', '$l_name');")or die(mysqli_error($conn));
	$query3=mysqli_query($conn,"SELECT * FROM registration where licence_drive_id='$licence_drive_id' AND ID='$ID'")or die(mysqli_error($conn));
	if (mysqli_num_rows($query3)>0) {
		$rows = mysqli_fetch_assoc($query3);
		echo "<center><p style='color:red;'>This already in system</p></center>";
	}
	else{
	$query2=mysqli_query($conn,"INSERT INTO `registration` (`licence_drive_id`, `plack`, `road_id`, `ID`, `category`) VALUES ('$licence_drive_id', '$plack','$road_id', '$ID', '$category');")or die(mysqli_error($conn));
	$query=mysqli_query($conn,"UPDATE bus SET road_id='$road_id',status='OFF' WHERE plack='$plack'")or die(mysqli_error($conn));
	$query=(mysqli_query($conn,"INSERT INTO `setting_table` ( `ID`, `licence_drive_id`, `plack`, `road_id`, `time_leave`, `time_lease`, `status`) VALUES ('$ID', '$licence_drive_id', '$plack', '$road_id', '$time_leave', '$time_lease', '$status');"));
	
	header("location:./selectDrivers.php");
}
$query6=mysqli_query($conn,"UPDATE bus SET status='OFF' WHERE plack='$plack'") or die(mysqli_error($conn));
}
?>
<script  type="text/javascript">
	function isNumberKey(evt){
		
		var charCode=(evt.which) ? evt.which : event.keyCode
		if(charCode > 31 &&(charCode<48 || charCode > 57))
			return false;
		return true;

	}
</script>
<script type="text/javascript">
function noNumbers(e)
{
var keynum
var keychar
var numcheck
if(window.event) // IE
{
keynum = e.keyCode
}
else if(e.which) // Netscape/Firefox/Opera
{
keynum = e.which
}
keychar = String.fromCharCode(keynum)
numcheck = /\d/
return !numcheck.test(keychar)
}
</script>	
						
							<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12" >
							<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>Firstname</label>
								<input type="text" class="form-control" name="f_name"  onkeypress="return noNumbers(event)">
								</div>
								<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>Lastname</label>
								<input class="form-control" type="text" name="l_name" onkeypress="return noNumbers(event)">
							</div>

							<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>Identity</label>
								<input type="text" class="form-control" name="ID" maxlength="16"  onKeyPress="return isNumberKey(event)">
								</div>

								<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>Licence Drive ID</label>
								<input class="form-control" type="text" name="licence_drive_id" onKeyPress="return isNumberKey(event)" maxlength="16">
							</div>
								<input type="hidden" name="status" value="Free">
								<input type="hidden" name="time_leave" value="<?php echo "Taken at,".date('h:m:s'); ?>">
								<input type="hidden" name="time_lease" value="not available">
							<div class=" input-field col-lg-12 col-md-12 col-sm-12">
							   	
								<label>Car plack </label>
									<select name="plack" class="form-control">
									<option></option>
									<?php
                					include('connect.php');
                					
                    				$query = "SELECT * FROM bus where status='ON'";
                    				$results=mysqli_query($conn, $query);
                    				//loop
                   				 foreach ($results as $dept){
                   				 			 //$program_id=$dept['program_id'];
                   				 		?>
                   				 			<option value="<?php echo $dept["plack"];?>"><?php echo $dept["plack"];?></option>

									<?php
												}
                					?>

								</select>
							
								</div>
								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
							   	
								<label>Road</label>
									<select name="road_id" class="form-control">
									<option></option>
									<?php
                					include('connect.php');
                					
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
								<label>Category </label>
							
									<select name="category" class="form-control">
									<option></option>
									<option>A</option>
									<option>B</option>
									<option>C</option>
									<option>D</option>
									<option>F</option>
								</select><br>
						</div>
							<div class="input-field col-lg-12 col-md-12 col-sm-12">
								<button class="btn btn-default"  name="submit" id="button" >Submit</button>
							</div>
						</div>
					</div>
				</form>

</body>
</html>
<script>
	function validateform(){
		
			var f_name=document.drivers.f_name.value;
			var l_name=document.drivers.l_name.value;
			var ID=document.drivers.ID.value;
			var licence_drive_id=document.drivers.licence_drive_id.value;
			var plack=document.drivers.plack.value;
			var road_id=document.drivers.road_id.value;
			var category=document.drivers.category.value;
			var id2=ID.substr(5,1);
			var id3=licence_drive_id.substr(5,1);
			var id4=licence_drive_id.substr(0,1);
			//var phone=tel.substr(0,3);
			var id1=ID.substr(0,1);
			var letter=/^[A-Za-z". "]+$/;
			var number=/^[0-9" "]+$/;
			if (f_name=="") {
				alert("Enter Driver First name please!");
				return false;
			}
			if (!f_name.match(letter)) {
				alert("Only characters allowed for name");
				return false;
			}
			if (l_name=="") {
				alert("Enter Driver Last name please!");
				return false;
			}
			if (!l_name.match(letter)) {
				alert("Only characters allowed for name");
				return false;
			}
			if (ID=="") {
				alert("Enter Driver Identity please!");
				return false;
			}
			if(id1!=1){
			alert("The Identity number must start with 1");
			return false;
			}
			if (ID.length!=16) {
				alert( "ID number must contain at least 16 digit");
				return false;
			}
			if(id2==7 || id2==8){
			}
				else{
			alert("Please Write carefully your ID");
			return false;
			}
			if (licence_drive_id=="") {
				alert("Please Enter driver licence ID");
				return false;
			}
			if(id4!=1){
			alert("The Licence ID must start with 1");
			return false;
			}
			if (licence_drive_id.length!=16) {
				alert( "Licence ID must contain at least 16 digit");
				return false;
			}
			if(id3==7 || id3==8){
			}
				else{
			alert("Please Write carefully your Licence ID");
			return false;
			}
			if (plack=="") {
				alert("Please select plack car");
				return false;
			}
			if (road_id=="") {
				alert("Please select road");
				return false;
			}
			if (category=="") {
				alert("Please Select Driver Category");
				return false;
			}
		}
		</script>