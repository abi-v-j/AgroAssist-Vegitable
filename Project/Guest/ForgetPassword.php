<?php 
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_login']))
{
	$email = $_POST['txt_email'];
	$question = $_POST['sel_question'];
	$answer = $_POST['txt_answer'];
	
	$selUser = "select * from tbl_farmer where farmer_email='$email' , farmer_question='$question' and farmer_answer='$answer'";
	$resUser=$Con -> query($selUser);
	if($dataUser=$resUser -> fetch_assoc())
	{ 
	
        <script>
        alert("Inserted");
	window.location = "ChangePassword.php";
	</script>
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forget Password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Question</td>
      <td><label for="txt_question"></label>
        <label for="sel_question"></label>
        <select name="sel_question" id="sel_question">
      </select></td>
    </tr>
    <tr>
      <td>Answer</td>
      <td><label for="txt_answer"></label>
      <input type="text" name="txt_answer" id="txt_answer" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>