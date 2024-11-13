<?php 
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_login']))
{
	$email = $_POST['txt_email'];
	$password = $_POST['txt_password'];
	
	$selAdmin = "select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$resAdmin=$Con -> query($selAdmin);
	if($dataAdmin=$resAdmin -> fetch_assoc())
	{
	$_SESSION["aid"]=$dataAdmin['admin_id'];
	$_SESSION["adminname"]=$dataAdmin['admin_name'];
	header("location:../Admin/HomePage.php");
	}



     $selUser = "select * from tbl_user where user_email='$email' and user_password='$password'";
	 $resUser=$Con -> query($selUser);
	if($dataUser=$resUser -> fetch_assoc())
	{
	$_SESSION["uid"]=$dataUser['user_id'];
	$_SESSION["username"]=$dataUser['user_name'];
	header("location:../User/HomePage.php");
	}
	
	
	 $selUser = "select * from tbl_farmer where farmer_email='$email' and farmer_password='$password'";
	 $resUser=$Con -> query($selUser);
	if($dataUser=$resUser -> fetch_assoc())
	{
	$_SESSION["fid"]=$dataUser['farmer_id'];
	$_SESSION["farmername"]=$dataUser['farmer_name'];
	header("location:../Farmer/HomePage.php");
	}
	
	
	
	 $selUser = "select * from tbl_supplier where supplier_email='$email' and supplier_password='$password'";
	 $resUser=$Con -> query($selUser);
	if($dataUser=$resUser -> fetch_assoc())
	{
	$_SESSION["sid"]=$dataUser['supplier_id'];
	$_SESSION["suppliername"]=$dataUser['supplier_name'];
	header("location:../Supplier/HomePage.php");
	}
	
}
	?>
   
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Guest Login</title>
</head>

<body>
<h1 align="center">LoginForm</h1>
<form id="form1" name="form1" method="post" action="">
   <table width="200" border="1" align="center">
   
    <tr>
      <td>Email</td>
       <td> <label for="txt_email"></label>
        <input type="email" name="txt_email" id="txt_email" required="required" placeholder="Enter your Email" pattern="/^[a -zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required"placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_login" id="btn_login" value="Login" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <a href="Farmer.php">NewFarmer</a>/<a href="Supplier.php">NewSupplier</a>/<a href="NewUser.php">NewUser</a>
      &nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html> -->




<!doctype html>
<html lang="en">
  <head>
  	<title>Login 3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Templates/Login/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(../Assets/Templates/Login/images/bg.avif);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">	
					<h2 class="heading-section">Login #3</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="email" class="form-control" placeholder="Email" name="txt_email" id="txt_email" required="required" placeholder="Enter your Email" pattern="/^[a -zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" name="txt_password" id="txt_password" required="required"placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" name="btn_login" id="btn_login">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Templates/Login/js/jquery.min.js"></script>
  	<script src="../Assets/Templates/Login/js/popper.js"></script>
  	<script src="../Assets/Templates/Login/js/bootstrap.min.js"></script>
  	<script src="../Assets/Templates/Login/js/main.js"></script>

	</body>
</html>

