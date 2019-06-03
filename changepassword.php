<html>

<head>
	<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<body style="background-image: url(image/bus6.jpg);"><br><br><br><br>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-body">
					<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link rel="stylesheet" href="../css/bootstrap.min.css">
					<title>RFTC</title>
					<link rel="stylesheet" href="cssform/style.css">
				</head>
					<div class="panel panel-default">
		<div class="panel-heading">
  		<div class="panel panel-primary">
    	<div class="panel-heading"><strong style="text-align: center;"> <p>Change your password</p>
		</div></strong>
					<form class="form-horizontal" role="form" action="" method="POST">

						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12">
								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
									<label>Username</label>
									<input class="form-control"  type="text" name="username" placeholder="" >
								</div>
								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
									<label>Email</label>
									<input class="form-control"  type="email" name="email" placeholder="" >
								</div>
								<div class="input-field col-lg-12 col-md-12 col-sm-12">
									<label>New password</label>
									<input class="form-control" type="password" name="npass" >
								</div>
								<div class="input-field col-lg-12 col-md-12 col-sm-12">
									<label>Confirm New Password</label>
									<input class="form-control" type="password" name="cpass">
								</div>
									<div class="input-field col-lg-12 col-md-12 col-sm-12">
										<button class="btn btn-default " name="submit">CHANGE</button>
										<button class="btn btn-default " name="reset">CANCEL</button>
									</div>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div></div></div></div>
</body>

</html>

<?php
include_once("connect.php");

if(isset($_POST['submit'])){

$user=$_POST['username'];
$user=$user;
$email=$_POST['email'];
$new_pass=$_POST['npass'];
$re_password=$_POST['cpass'];

$sql=mysqli_query($conn,"SELECT * FROM admin WHERE username='$user' && email='$email' ");
if(mysqli_num_rows($sql)>0){

if($new_pass===$re_password){

$sq=mysqli_query($conn,"UPDATE admin SET password='$new_pass'  WHERE username='$user' && email='$email'");

echo "<script>alert('your password changed')</script>";
echo "<script>window.location.assign('login.php')</script>";
}else{
echo "<script>alert('your password not match')</script>";	
}

}else{

echo "<script>alert('invalid username or email')</script>";

}


}

?>