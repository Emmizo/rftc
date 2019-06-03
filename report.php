<?php
include('header.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>
<body align="center" background="pic/bg2.JPG">




<center>
<div class="panel panel-default">
		<div class="panel-heading">
  <div class="panel panel-primary">
    <div class="panel-heading"><strong>Report<form action="" method="POST" ></div></strong>
  <div class="wrapper">
    <div class="panel-body">

<form action="" method="post">

	<table class="table" style="max-width: 800px">
		<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12" >
<tr><td>
							<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>From</label>
								<input type="text" class="form-control" name="from" id="datepicker" plcaeholder="yyyy-mm-dd">
								</div>
							</td>

	<td>					<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
								<label>To</label>
								<input type="text" class="form-control" name="to" id="datepicker1" plcaeholder="yyyy-mm-dd">
								</div></td></tr>
<tr><td colspan="2">
	<div class="input-field col-lg-12 col-md-12 col-sm-12">
								<button class="btn btn-default"  name="send" id="button" >Report</button>
							</div></td>
						</tr></div>
 
	
</table>


<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}

</script>

<center><button class="btn btn-default" ><a href="javascript:Clickheretoprint()">Print your report</a></button></center>
<div id="print_content" >

</form>

<?php
if(isset($_POST['send'])){
$from=$_POST['from'];
$to=$_POST['to'];
?>

<center>
<table class="table">
		<tr bgcolor="#C1DAD7">
		<td>No</td>
		<td>Name</td>
		<th>Identity</th>
		<th>Licence Drive ID</th>
		<th>Date</th>
		<th>Plack</th>
		<th>Road</th>
		<th>Time Left</th>
		<th>Time Leased</th>
		<th>status</th>
		
<div id="content">
<?php
include("connect.php");

//Fetch from database first 10 items which is its limit. For that when page open you can see first 10 items. 
$query=(mysqli_query($conn,"SELECT archive.date_done,road.road_name, archive.ID,archive.licence_drive_id,archive.plack,archive.road_id,archive.status,drivers.f_name,drivers.l_name,archive.time_leave,archive.time_lease from archive
                INNER JOIN drivers ON drivers.ID=archive.ID
                INNER JOIN road ON archive.road_id=road.road_id WHERE date_done BETWEEN '$from' AND '$to'" ))or die(mysqli_error($conn));
?>

<ul>
<?php
//print 10 items
$a=0;
while($row=mysqli_fetch_array($query))
{
	$a++;
?>
<tr>
		<td><?=$a;?></td>
    	<td><?=$row['f_name']." ".$row['l_name']?></td>
	    <td><?php echo $row['ID'];?></td>
	    <td><?php echo $row['licence_drive_id'];?></td>
	    <td><?php echo $row['date_done'];?></td>
	    <td><?php echo $row['plack'];?></td>
	     <td><?php echo $row['road_name'];?></td>
	      <td><?php echo $row['time_leave'];?></td>
	      <td><?php echo $row['time_lease'];?></td>
	      <?php
	      if ($row['status']=='Free') {
	      	
	      
	      ?>
	       <td><button class="btn btn-default" style="background-color: green; color: white;"><?php echo $row['status'];?></button></td>
	       <?php
	       }else{
	       ?>
	       <td><button class="btn btn-default" style="background-color: red; color: white;"><?php echo $row['status'];?></button></td>
	       <?php
	       }
	       ?>
	       
	</tr>
<?php
}
?>
<tr style="background-color:green; color:white; font-weight:bold; font-size:14px"> 
	<td colspan="8" >Process of how car used from <?php echo $from ."  to  ".$to; ?></td><td></td>  <td><?php echo $a;?></td></tr>
</table>
</center>

<?php
}

?>
</div>
</div>
</div></div></div>
</body>
</html>
<link rel="stylesheet" href="jquery-ui.css">
<link rel="stylesheet" href="style.css">
<script src="source.js"></script>
<script src="now2.js"></script>
<style type="text/css">
  
  #datepicker{
    color:black;
  }
<script src="source.js"></script>
  <script src="now2.js"></script>
  <style type="text/css">
    
    #datepicker{
      color:black;
    }
  </style>
  <script>

  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'dd/mm/yy'});
   
  } );

  </script>
  <style type="text/css">
  
  #datepicker{
    color:black;
  }
<script src="source.js"></script>
  <script src="now2.js"></script>
  <style type="text/css">
    
    #datepicker{
      color:black;
    }
  </style>
  <script>

  $( function() {
    $( "#datepicker1" ).datepicker({dateFormat:'dd/mm/yy'});
   
  } );
  
  </script>