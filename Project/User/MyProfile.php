<?php 
include("../Assets/Connection/Connection.php");
session_start();
$selQry = "select * from tbl_user where user_id =".$_SESSION["uid"];
$result = $Con -> query($selQry);
$data = $result -> fetch_assoc();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>
<h1 align="center">User Profile</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><input type="image" name="img_photo" id="img_photo" src="../Assets/Files/UserDocs/image8.jpg" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"]?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"]?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]?></td>
    </tr>
    <tr>
      <td>Address</td>
       <td><?php echo $data["user_address"]?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>