<?php 
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST['btn_submit']))
{
	$cureentPassword = $_POST['txt_oldpass'];
	$selPassword = "select * from tbl_supplier where supplier_password = '$cureentPassword' and supplier_id =".$_SESSION["uid"];
	$resSupplier = $Con ->query($selPassword);
	if($dataSupplier = $resSupplier -> fetch_assoc())
	{
		$newPassword = $_POST['txt_newpass'];
		$confirmPassword = $_POST['txt_repass'];
		if($newPassword==$confirmPassword)
		{
				$upQry = "update tbl_supplier set supplier_password='$newPassword' where supplier_id =".$_SESSION["uid"];
				if($Con -> query($upQry))
				{
						?>
                        			<script>
						alert("Password Updated...");
						window.location="HomePage.php";
				</script>
                 <?php
				}
		}
		else
		{
			
			?>
			<script>
						alert("Password not same");
						
				</script>
                <?php
		}
	}
	else
	{
		?>
		<script>
						alert("Please check old password");
						
				</script>
                <?php
	}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Supplier Change password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h3 align="center">Change Password</h3> 
  <table width="378" height="185" border="1" align="center">
    <tr>
      <td>Current password</td>
      <td><label for="txt_oldpass"></label>
      <input type="text" name="txt_oldpass" id="txt_oldpass"  placeholder="Enter current passsword"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpass"></label>
      <input type="text" name="txt_newpass" id="txt_newpass" placeholder="Enter new passsword"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_repass"></label>
      <input type="text" name="txt_repass" id="txt_repass" placeholder=" Re-Enter passsword"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Change Password" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>