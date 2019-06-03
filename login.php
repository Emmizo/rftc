<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  include('connect.php');
  session_start();
$usernameError = '';
$passwordError = '';

$errorMessage = '';
$errorMessage2 = '';

$errors = 0;
if (isset($_POST['login'])) {
  $username=$_POST['username'];
  $password=$_POST['password'];
  if(empty($_POST['username'])){
    $error = 1;
    $usernameError = 'Enter your username';
  }if(empty($_POST['password'])){
    $errors = 1;
    $passwordError = 'Enter your password';
  }
  if($errors == 0){
  $sql1=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' AND password='$password'")or die (mysqli_error($conn));
 
 if (mysqli_num_rows($sql1)>0) {
  $data=mysqli_fetch_assoc($sql1);
  $_SESSION['id']=$data['id'];
   header("location:./viewreport.php");
  }
  else{
    $errorMessage = 'Incorect username or password';
  }}
   }
?>
  <!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
  <title>RFTC</title>
  <link rel="stylesheet" href="">
<link rel="stylesheet" href="css/bootstrap.min.css">

  <style type="text/css">

    .error{
      color: red;
    }
  </style>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(image/bus6.jpg);"><br><br><br><br>

<div class="container" style="max-width: 700px;">
  <div class="panel panel-default1">
  <div class="panel-heading1">
  <div class="panel panel-primary" style="max-width: 700px;">
    <div class="panel-heading" ><strong style="text-align: center;"><p> Login</p></strong></div>
  <div class="panel-body" ">
  <div class="wrapper">
  <form class="form" action="login.php" method="POST">
    <div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12" >
  <div class=" input-field col-lg-12 col-md-12 col-sm-12" >
    <div class="form-group">
      <label >Username</label>
      <input type="text" class="form-control" name="username" placeholder="username">
    </div>
    <div class="error"><?php echo $usernameError; ?></div>
</div>
<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
    <div class="form-group">
      <label >Password</label>
      <input type="password" class="form-control"  name="password" placeholder="Enter password">
    </div>
    <div class="error"><?php echo $passwordError; ?></div>
<div class="error"><?php echo $errorMessage; ?></div>
<div class="error"><?php echo $errorMessage2; ?></div>
</div>
<div class=" input-field col-lg-12 col-md-12 col-sm-12" >
    <div class="checkbox">
      <label><input type="checkbox" name="remember_me"> Remember me</label>
       <?php
    if(!empty($_POST["remember_me"])) {
  setcookie ("username",$_POST["username"],time()+ 3600);
  setcookie ("password",$_POST["password"],time()+ 3600);
  //echo "Cookies Set Successfuly";
} else {
  setcookie("username","");
  setcookie("password","");
  //echo "Cookies Not Set";
}
      ?>
    </div>
    <button type="submit" class="btn btn-default" name="login">Login</button>
    </form>
<div><a href="changepassword.php" style="text-decoration: none;color: green;">Click Here If You Forget Password</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>
<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_form_basic&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2017 16:50:31 GMT -->
</html>
