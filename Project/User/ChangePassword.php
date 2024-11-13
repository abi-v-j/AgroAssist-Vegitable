<?php 
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST['btn_sub']))
{
	$cureentPassword = $_POST['txt_olpass'];
	
	$selPassword = "select * from tbl_user where user_password = '$cureentPassword' and user_id =".$_SESSION["uid"];
	$resUser = $Con ->query($selPassword);
	if($dataUser = $resUser -> fetch_assoc())
	{
		$newPassword = $_POST['txt_newpass'];
		$confirmPassword = $_POST['txt_repass'];
		if($newPassword==$confirmPassword)
		{
				$upQry = "update tbl_user set user_password='$newPassword' where user_id =".$_SESSION["uid"];
				if($Con -> query($upQry))
				{
						?>
                        			<script>
						alert("Password Updated...");
						window.location="Homepage.php";
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
<title>Change Password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h3 align="center">Change Password</h3> 
  <table width="340" height="185" border="1" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_olpass"></label>
      <input type="text" name="txt_olpass" id="txt_olpass"  placeholder="Enter Old Password" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpass"></label>
      <input type="text" name="txt_newpass" id="txt_newpass"  placeholder="Enter New Password"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_repass"></label>
      <input type="text" name="txt_repass" id="txt_repass" placeholder="Re-Enter Password" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      		<input type="submit" name="btn_sub" value="Change Password"/>
            <input type="reset" name="btn_sub" value="Cancel"/>
      </td>
    </tr>
  </table>
</form>
</body>
</html>