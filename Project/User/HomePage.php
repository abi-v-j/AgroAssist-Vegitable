<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Homepage User</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <td>Welcome</td>
    <td><?php echo $_SESSION["username"]?></td>
  </tr>
  <tr>
    <td><a href="MyProfile.php">My Profile</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="Edit.php">EditProfile</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="ChangePassword.php">ChangePassword</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<form id="form1" name="form1" method="post" action="">
</form>
</body>
</html>