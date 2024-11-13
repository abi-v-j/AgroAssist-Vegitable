<?php
		include("../Assets/Connection/Connection.php");
		session_start();
		if(isset($_POST['btn_send']))
		{
			$title=$_POST['txt_title'];
			$description=$_POST['txt_description'];
			
			$insQry="insert into tbl_complaint(	complaint_title,complaint_content,supplier_id,product_id,complaint_date) values('$title','$description','".$_SESSION['sid']."','".$_GET['pid']."',curdate())";
			if($Con -> query($insQry));
			{
?>
			<script>
			alert("Send Complaint...");
            </script>
<?php            
            
            }
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><label for="txt_description"></label>
      <textarea name="txt_description" id="txt_description" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_send" id="btn_send" value="Send" /></td>
    </tr>
  </table>
</form>
</body>
</html>