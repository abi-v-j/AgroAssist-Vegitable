<?php
session_start(); 
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Homepage</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
   <tr>
      <td>Welcome</td>
     <td><?php echo $_SESSION["adminname"]?></td>
     <tr>
    <td><a href="District.php">District</a></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><a href="Place.php">Place</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="AdminReg.php">AdminRegistration</a></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><a href="Category.php">Category</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="Subcategory.php">Subcategory</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="UserList.php">UserList</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="ViewFeedback.php">ViewFeedback</a></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><a href="ViewSupplier.php">ViewSupplier</a></td>
    <td>&nbsp;</td>
 </tr>
 <tr>
    <td><a href="ViewFarmer.php">ViewFarmer</a></td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td><a href="Reply.php">Reply</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="ViewReply.php">ViewReply</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="ViewComplaint.php">ViewComplaint</a></td>
    <td>&nbsp;</td>
  </tr>
  
  </table>
</form>
</body>
</html>