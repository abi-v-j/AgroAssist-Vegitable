<?php 
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_send']))
{
	$feedback = $_POST['txt_feedback'];
	$insQry = "insert into tbl_feedback(feedback_content,supplier_id) values('$feedback','".$_SESSION['sid']."')";
		if($Con -> query($insQry));
	{
?>
        <script>
		alert("Feedback Sended");
		</script>
<?php
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Supplier Feedback</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Feedback</td>
      <td><label for="txt_feedback"></label>
      <textarea name="txt_feedback" id="txt_feedback" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_send" id="btn_send" value="Send" /></td>
    </tr>
  </table>
</form>
</body>
</html>