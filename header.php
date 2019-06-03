<?php

date_default_timezone_set('Africa/Kigali');
ob_start();
session_start();
include('connect.php'); 
$id=isset($_SESSION['id'])? $_SESSION['id']:"";
if (isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
}
else{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RFTC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style type="text/css">
  table{
    border: 1px 
    solid; 
    font: 10px verdana;
  }
</style>
</head>
<body><br><br><br>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class=""><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role='button' aria-haspopup="true" aria-expanded="false" >DRIVERS REGISTERED <span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li><a href="selectDrivers.php">All Drivers </a></li>
              <li><a href="Report.php">Accomplish Report</a></li>
            </ul>
          </li>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role='button' aria-haspopup="true" aria-expanded="false" >LEAVE AND LEASE CAR <span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li><a href="leavecar.php">Leave car</a></li>
              <li><a href="leasecar.php">Lease car</a></li>
               <li><a href="viewreport.php">View Day report</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">CAR AND ROAD<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="car.php">Car</a></li>
              <li><a href="road.php">Road</a></li>
              
            </ul>
          </li></ul>
         
        <ul class="nav navbar-nav navbar-right">
        <li><a href="changepass_dm.php"><span class="glyphicon glyphicon-log-in"></span>Change Password</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
