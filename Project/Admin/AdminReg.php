<?php
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
$search = "";
if(isset($_POST['btn_submit']))
{
	$name = $_POST['txt_name'];
	$email = $_POST['txt_email'];
	$password = $_POST['txt_password'];
	
	$insQry = "insert into tbl_admin(admin_name,admin_email,admin_password) values('$name','$email','$password')";
	if($Con -> query($insQry))
	{
?>
        <script>
		alert("Inserted");
		</script>
<?php
	}
}


if(isset($_GET['did']))
{
	$delQry = "delete from tbl_admin where admin_id = ".$_GET['did'];
	if($Con -> query($delQry))
	{
?>
        <script>
		alert("Deleted");
		window.location ="AdminReg.php";
		</script>
<?php
	}
}

if(isset($_POST['btn_search']))
{
		$search = $_POST['txt_search'];
		$selQry = "select * from tbl_admin where admin_name LIKE '$search%'";

}
else
{
		$selQry = "select * from tbl_admin";

}
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required"placeholder="Enter your Name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required"placeholder="Enter your Email" pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required"placeholder="Enter your Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td><label for="txt_search"></label>
       <input type="text" name="txt_search" id="txt_search" value="<?php echo $search ?>"/></td>
      <td><input type="submit" name="btn_search" id="btn_search" value="Search"/></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table  border="1">
    <tr>
      <td>Sl No</td>
      <td>Name</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
<?php
	$i=0;
	
	$result = $Con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['admin_name'] ?></td>
      <td><?php echo $data['admin_email']?></td>
      <td><a href="AdminReg.php?did=<?php echo $data['admin_id']?>">Delete</a></td>
    </tr>
<?php
	}
?>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>