<?php 
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selQry = "select * from tbl_supplier where supplier_id =".$_SESSION['sid'];
$result = $Con -> query($selQry);
$data = $result -> fetch_assoc();


if(isset($_POST['btn_edit']))
{
	$name = $_POST['txt_name'];
	$email = $_POST['txt_email'];
	$contact = $_POST['txt_contact'];
	$address=$_POST["txt_address"];
	
	$upQry = "update  tbl_supplier set supplier_name='$name',supplier_email ='$email',supplier_contact='$contact',supplier_address='$address' where supplier_id=".$_SESSION["sid"];
	if($Con -> query($upQry))
	{
?>
        <script>
		alert("Profile Updated");
		window.location="MyProfile.php";
		</script>
<?php
	      }
    }

?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>
<h1 align="center">Supplier  Edit Profile</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
     <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data["supplier_name"]?>" /></td> 
    </tr>
    <tr>
      <td>Email</td>
        <td><label for="txt_email"></label>
        <input type="text" name="txt_email" id="txt_email" value="<?php echo $data["supplier_email"]?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["supplier_contact"]?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"><?php echo $data["supplier_address"]?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_edit" id="btn_edit" value="Edit" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>