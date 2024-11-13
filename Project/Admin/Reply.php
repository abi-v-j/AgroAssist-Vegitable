<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
  $up = "update tbl_complaint set complaint_status=1, complaint_reply='".$_POST["txt_reply"]."' where complaint_id=".$_GET["id"];
  if($Con->query($up))
  {
    ?>
    <script>
      alert("Replyed Sent Sucessfully..")
      window.location = "Complaint.php"
    </script>
    <?php
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply Page</title>
</head>

<body>
<h2 align="center"> Reply</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td width="94">Reply</td>
      <td width="90"><label for="txt_reply"></label>
      <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>